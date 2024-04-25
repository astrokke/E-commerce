<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class CartController extends Controller
{
    // Afficher le panier de l'utilisateur
    public function index()
    {
        $cartItems = CartItem::with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    // Ajouter un produit au panier
    public function add(Request $request)
{
    $this->validate($request, [
        'product_id' => 'required|exists:products,id',
    ]);

    $product = Product::findOrFail($request->product_id);
    $item = CartItem::where('product_id', $request->product_id)
                    ->first();

    if ($item) {
        // Si le produit existe déjà dans le panier, incrémentez la quantité
        $item->increment('quantity');
    } else {
        // Sinon, créez un nouvel article dans le panier avec toutes les informations nécessaires
        CartItem::create([
            'product_id' => $product->id,
            'product_name' => $product->name,
            'price' => $product->price,
            'image_url' => $product->image_url ?? 'https://images.pexels.com/photos/190819/pexels-photo-190819.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', // Provide a default image URL if null
            'quantity' => 1  // Quantité initiale, modifiez selon les besoins
        ]);
    }

    Log::info('Adding to cart', [
        'product_id' => $product->id,
        'product_name' => $product->name,
        'price' => $product->price,
        'image_url' => $product->image_url,
        'quantity' => 1
    ]);
    
    return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier avec succès');
}



    

    

    // Mettre à jour la quantité d'un produit dans le panier
    public function update(Request $request)
    {
        $item = CartItem::where('user_id', Auth::id())
                        ->where('product_id', $request->id)
                        ->firstOrFail();
        
        $product = Product::findOrFail($request->id);
    
        $this->validate($request, ['quantity' => 'required|integer|min:1']);
        $item->update([
            'quantity' => $request->quantity,
            'product_name' => $product->name,
            'price' => $product->price,
            'image_url' => $product->image_url
        ]);
    
        return redirect()->back()->with('success', 'Panier mis à jour avec succès');
    }
    

    // Vider le panier
    public function remove(Request $request, $id)
    {
        $item = CartItem::where('id', $id)->first();
        if ($item) {
            $item->delete();
            return redirect()->back()->with('success', 'Produit retiré du panier');
        } else {
            return redirect()->back()->with('error', 'Produit introuvable');
        }
    }
}