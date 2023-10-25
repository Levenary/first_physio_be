<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Products deleted successfully.']);
    }

    public function showProducts()
    {
        // Mengambil data produk dengan kolom yang spesifik
        $products = Product::select('name', 'price', 'session', 'time_span', 'category_id', 'is_active')
            ->get();

        // Mengembalikan data dalam bentuk response JSON
        return response()->json($products);
    }
}