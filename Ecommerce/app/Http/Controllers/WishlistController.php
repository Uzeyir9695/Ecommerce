<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())->latest()->paginate(12);
        return view('ecommerce.wishlist', compact('wishlists'));
    }

    public function addToWishlist(Request $request)
    {
        $wishlist = Wishlist::create([
           'user_id' => auth()->id(),
           'product_id' => $request->id
        ]);
        $wishlist_id = $wishlist->id;
        return response()->json(['message' => 'Product added to you wishlist!', 'wishlist_id' => $wishlist_id], 201);
    }

    public function navbarWishlistsCounter()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())->count();
        return response()->json(['wishlists' => $wishlists]);
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return response()->json(['message' => 'Product removed from wishlist'], 201);
    }
}
