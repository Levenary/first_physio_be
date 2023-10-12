<?php

// app/Http/Controllers/PurchaseOrderItemController.php

namespace App\Http\Controllers;

use App\Models\PurchaseOrderItem;
use Illuminate\Http\Request;

class PurchaseOrderItemController extends Controller
{
    public function index()
    {
        $purchaseOrderItems = PurchaseOrderItem::all();
        return response()->json($purchaseOrderItems);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_item_id' => 'required|exists:product_items,id',
        ]);

        $purchaseOrderItem = PurchaseOrderItem::create($data);

        return response()->json($purchaseOrderItem, 201);
    }

    // Tambahkan fungsi-fungsi lain seperti show(), update(), dan destroy() jika diperlukan.

     public function productItem(Request $request, $productItemId)
    {
        // Validasi data dari request jika diperlukan
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        // Temukan item produk berdasarkan ID $productItemId
        $productItem = ProductItem::find($productItemId);

        // Lakukan operasi atau logika lainnya sesuai kebutuhan aplikasi
        // ...

        // Memberikan respons sesuai dengan hasil operasi
        if ($productItem) {
            return response()->json(['message' => 'Product item found', 'data' => $productItem], 200);
        } else {
            return response()->json(['message' => 'Product item not found'], 404);
        }
    }
}
