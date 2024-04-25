@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="w-full max-w-lg mx-auto shadow-md rounded px-8 pt-6 pb-8 mb-4  bg-[#111827]">
        <h2 class="block text-gray-700 text-xl font-bold mb-6">Ajouter un nouveau produit</h2>
        <form action="{{ route('produits.ajouter') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom du produit:</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" required>
            </div>
            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" required></textarea>
            </div>
            <div class="mb-6">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Prix:</label>
                <input type="number" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" name="price" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Ajouter le produit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
