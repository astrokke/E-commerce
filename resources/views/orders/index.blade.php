@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Orders</h1>
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">User ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Total</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Details</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($orders as $order)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="text-sm leading-5 text-blue-900">{{ $order->id }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="text-sm leading-5 text-blue-900">{{ $order->user_id }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="text-sm leading-5 text-blue-900">${{ number_format($order->total, 2) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                        <a href="{{ route('orders.show', $order->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
