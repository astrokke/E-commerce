@extends('layouts.app')

@section('content')
<div class="h-screen bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold"  id="#CART">Cart Items</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
      <div class="rounded-lg md:w-2/3">
      @foreach ($cartItems as $item)
<div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
    <img src="{{ $item->product->image_url }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
        <div class="mt-5 sm:mt-0">
            <h2 class="text-lg font-bold text-gray-900">{{ $item->product->name }}</h2>
            <p class="mt-1 text-xs text-gray-700">{{ $item->product->size }}</p>
        </div>
        <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
        @csrf
        
        <button type="submit" class="cursor-pointer p-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 duration-150 hover:text-red-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</form>

        </div>
    </div>
</div>
@endforeach

      </div>
      <!-- Sub total et autres calculs -->
      @if($cartItems->count() > 0)
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Subtotal</p>
          <p class="text-gray-700">${{ number_format($cartItems->sum(function ($item) { return $item->quantity * $item->product->price; }), 2) }}</p>
        </div>
        <div class="flex justify-between">
          <p class="text-gray-700">Shipping</p>
          <p class="text-gray-700">$4.99</p>
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Total</p>
          <div class="">
            <p class="mb-1 text-lg font-bold">${{ number_format($cartItems->sum(function ($item) { return $item->quantity * $item->product->price; }) + 4.99, 2) }} USD</p>
            <p class="text-sm text-gray-700">including TVA</p>
          </div>
        </div>
        <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
      </div>
      @else
      <p class="text-center">Your cart is empty.</p>
      @endif
    </div>
  </div>
@endsection
