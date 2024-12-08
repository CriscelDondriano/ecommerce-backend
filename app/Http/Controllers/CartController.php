<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product; // Ensure you have this import if using Eloquent

class CartController extends Controller
{
    public function add(Request $request)
{
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity', 1);

    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['success' => false, 'message' => 'Product not found'], 404);
    }

    // Save cart to the database
    $cartItem = Cart::updateOrCreate(
        ['product_id' => $productId, 'user_id' => auth()->id()], // Use user_id if your app has authentication
        ['quantity' => \DB::raw("quantity + $quantity")] // Increment quantity
    );

    return response()->json(['success' => true, 'cartItem' => $cartItem]);
}

    public function view()
    {
        $cart = Session::get('cart', []);
        return response()->json($cart);
    }

    public function remove(Request $request, $productId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        return response()->json(['success' => true, 'cartCount' => count($cart)]);
    }
}


