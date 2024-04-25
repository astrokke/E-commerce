<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalutController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('produits', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/salut' ,[SalutController::class , 'index']);
Route::get('/produit' ,[ProductController::class , 'index']);
// Routes pour les produits
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/produit/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/produits/ajouter', [ProductController::class, 'ajouter']) ->name('products.ajouter');
Route::post('/produits/ajouter', [ProductController::class, 'store'])->name('products.store');

// Routes pour le panier
Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::post('/panier/ajouter', [CartController::class, 'add'])->name('cart.add');
Route::post('/panier/mettre-a-jour', [CartController::class, 'update'])->name('cart.update');
Route::post('/panier/supprimer/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Routes pour les commandes
Route::get('/commande', [OrderController::class, 'index'])->name('order.index');
Route::post('/commande/creer', [OrderController::class, 'store'])->name('order.store');

require __DIR__.'/auth.php';
