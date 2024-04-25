<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Stocke une nouvelle commande.
     *
     ** @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */
    public function store(Request $request)
    {
        $cart = session()->get('cart');
    
        if (!$cart) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }
    
        $order = new Order();
        $order->user_id = Auth::id();  
        $order->total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        $order->save();
    
        foreach ($cart as $id => $details) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $id;
            $orderDetail->price = $details['price'];
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->save();
        }
    
        session()->forget('cart');
    
        return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
    }

    /**
     * Affiche les détails d'une commande.
     *
     * @param  int  $id  L'ID de la commande à afficher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('orderDetails.product')->findOrFail($id);
        
        if (Auth::id() !== $order->user_id) {
            return redirect()->back()->with('error', 'Unauthorized to view this order.');
        }

        return view('orders.show', compact('order'));
    }
    public function index()
{
    $orders = Order::where('user_id', Auth::id())->with('orderDetails.product')->get();

    return view('orders.index', compact('orders'));
}
}
