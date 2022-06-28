<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

    }

    public function addToCart(Request $request)
    {
        $cart = Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $request->id,
            'price' => $request->price,
            'discount' => $request->discount
        ]);

        $cart->products()->attach($request->id);
        $cart = $cart->load('products');

        $medias = $cart->products()->get()[0]->getMedia('productImages');

        return response()->json(['message' => 'Product added to you cart!', 'cart' => $cart, 'medias' => $medias], 201);
    }

    public function navbarCart()
    {
        $carts = Cart::with(['user', 'products.media'])->where('user_id', auth()->id())->get();
        return response()->json(['carts' => $carts]);
    }

    public function checkout()
    {
        $carts = Cart::where('user_id', auth()->id())->paginate(10);
        $totalPrice = $carts->sum('price');
        return view('ecommerce.checkout', compact('carts', 'totalPrice'));
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
//        $cart->products()->detach();
        return response()->json(['message' => 'Item removed from your cart'], 201);
    }
}
