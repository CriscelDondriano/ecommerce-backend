<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        // try {
        //     $validatedData = $request->validate([
        //         'barcode' => 'required|string|max:255',
        //         'name' => 'required|string|max:255',
        //         'description' => 'required|string',
        //         'price' => 'required|numeric',
        //         'quantity' => 'required|integer',
        //         'category' => 'required|string|max:255',
        //     ]);

        //     // Create the product
        //     return Product::create($validatedData);
        // } catch (\Exception $e) {
        //     // Log the error message using the Log facade
        //     Log::error('Error creating product: ' . $e->getMessage());
        //     // Return a JSON response with an error message
        //     return response()->json(['error' => 'Unable to create product'], 500);
        // }
        $product = new Product();
        $product->barcode = $request->barcode;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $product->save();

        return response()->json([
            'product' => $product,
            'message' => 'Product created', 
            'method' => 'POST'], 
        201);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {

            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'category' => 'required',
            ]);

            $product->barcode = $request->barcode;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category = $request->category;
            $product->save();
            return response()->json();
     
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
       
    }

    public function search(Request $request)
{
    $query = $request->input('query'); // Get the search query from the request

    // Search products based on the query (name or description, etc.)
    $products = Product::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->orWhere('category', 'LIKE', "%{$query}%")
                        ->get();

    // Return the results as a JSON response
    return response()->json($products);
}


}