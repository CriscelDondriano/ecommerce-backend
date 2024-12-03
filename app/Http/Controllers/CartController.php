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

        // Retrieve product details from the database
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            // If the product already exists in the cart, increment its quantity
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Add new product to the cart
            $cart[$productId] = [
                'quantity' => $quantity,
                'name' => $product->name,
                'price' => $product->price,
            ];
        }

        Session::put('cart', $cart);

        return response()->json(['success' => true, 'cartCount' => count($cart)]);
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


