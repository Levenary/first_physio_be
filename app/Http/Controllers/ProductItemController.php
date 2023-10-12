<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductItem;

class ProductItemController extends Controller
{
    public function index()
    {
        $productItems = ProductItem::all();
        return response()->json($productItems);
    }

    public function store(Request $request)
    {
        $productItem = ProductItem::create($request->all());
        return response()->json($productItem, 201);
    }

    public function show(ProductItem $productItem)
    {
        return response()->json($productItem);
    }

    public function update(Request $request, ProductItem $productItem)
    {
        $productItem->update($request->all());
        return response()->json($productItem);
    }

    public function destroy(ProductItem $productItem)
    {
        $productItem->delete();
        return response()->json(['message' => 'ProductsItem deleted successfully.']);
    }

    public function purchaseOrderItems($productItemId)
{
    $productItem = ProductItem::findOrFail($productItemId);
    $purchaseOrderItems = $productItem->purchaseOrderItems;

    // Mengambil name dan price dari productItem
    $productName = $productItem->name;
    $productPrice = $productItem->price;

    // Menyusun data yang akan dijadikan response JSON
    $responseData = [
        'product_name' => $productName,
        'product_price' => $productPrice,
        'purchase_order_items' => $purchaseOrderItems
    ];

    return response()->json($responseData);
}

}
