<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    public function ajouter()
    {
        return view('products.create');
    }
public function store(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
         'photo' => 'required|photo', 
    ]);

    // Créer et sauvegarder le produit
    $product = new Product($validatedData);
    // Si vous gérez l'upload d'images, traitez l'image ici avant de sauvegarder.
    $product->save();

    // Rediriger vers la liste des produits avec un message de succès
    return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
}

}
