
@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="bg-white">
    <header>
       
    </header>
   
    <main class="my-8">
    <div class=" bg-white">
    <div  class="container m-auto  space-y-8 text-gray-500    ">
        <div class="justify-center text-center gap-6 md:text-left md:flex lg:items-center  h-96  bg-gray-400" style="background-image: url(https://media.istockphoto.com/id/1342734683/fr/photo/un-accessoire-pour-homme.jpg?s=612x612&w=0&k=20&c=tZIhOS7MhUOEJMvkHtI1jit9vc7_AJhz-PMd44Dmun4=); background-attachment: fixed; background-position: top; background-repeat: no-repeat; background-size: cover;">
            <div class="order-last mb-6 space-y-6 md:mb-0 md:w-6/12 lg:w-6/12">
                <h1 class="text-4xl text-white font-bold md:text-5xl">Acheter maintenant et beneficier de  <span class="text-blue-500">30% off</span></h1>
                <p class="text-lg">tarpin bien les montres</p>
                <div class="flex flex-row-reverse flex-wrap justify-center gap-4 md:gap-6 md:justify-end">
                    <a  href="#Montre" title="Start buying" class="w-full py-3 px-6 text-center rounded-xl transition bg-gray-700 shadow-xl hover:bg-gray-600 active:bg-gray-700 focus:bg-gray-600 sm:w-max">
                        <span class="block text-white font-semibold">
                            Start buying
                        </span>
                    </a>
                    <button type="button" title="more about" class="w-full order-first py-3 px-6 text-center rounded-xl bg-gray-100 transition hover:bg-gray-200 active:bg-gray-300 focus:bg-gray-200 sm:w-max">
                        <span class="block text-gray-600 font-semibold">
                            More about
                        </span>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-5 grid-rows-4 gap-4 md:w-5/12 lg:w-6/12 ">
                
            </div>
        </div>
    </div>
</div>
            <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium" id="Montre">Montres</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach ($products as $product)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <a href="{{ route('product.show', $product->id) }}">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{ $product->photo }}'); background-position:center;">
                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </div>
                        </a>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                            <span class="text-gray-500 mt-2">{{ number_format($product->price, 2) }} €</span>
                        </div>
                    </div>
                    @endforeach      
    </main>
    <div class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0" id="#Contact">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6  sm:rounded-lg">
                        <h1 class="text-4xl sm:text-5xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                            Besoin d'aide ?
                        </h1>
                        <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 mt-2">
                        Remplissez le formulaire pour entamer une conversation
                        </p>

                        <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                Corbac Inc, 2234 rue de la tourette, Montpellier,
                                34000
                            </div>
                        </div>

                        <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                +06 34984504
                            </div>
                        </div>

                        <div class="flex items-center mt-2 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                Cordbac@gémal.com
                            </div>
                        </div>
                    </div>

                    <form class="p-6 flex flex-col justify-center">
                        <div class="flex flex-col">
                            <label for="name" class="hidden">Nom</label>
                            <input type="name" name="name" id="name" placeholder="Nom" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div class="flex flex-col mt-2">
                            <label for="email" class="hidden">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div class="flex flex-col mt-2">
                            <label for="tel" class="hidden">numero</label>
                            <input type="tel" name="tel" id="tel" placeholder="Numero" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                        </div>

                        <button type="rien" class="md:w-32 bg-indigo-600 hover:bg-blue-dark text-white font-bold py-3 px-6 rounded-lg mt-3 hover:bg-indigo-500 transition ease-in-out duration-300">
                            ENVOYER
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-gray-200">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Corbac</a>
            <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
        </div>
    </footer>
</div>
@endsection
