<?php

// app/Http/Controllers/API/PurchaseOrderItemController.php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchaseOrderItem;

class PurchaseOrderItemController extends Controller
{
    public function index()
    {
        // Mengambil daftar item pembelian sebagai respons JSON
        $purchaseOrderItems = PurchaseOrderItem::all();
        return response()->json($purchaseOrderItems);
    }

    public function show($id)
    {
        // Mengambil detail item pembelian berdasarkan ID
        $purchaseOrderItem = PurchaseOrderItem::find($id);

        if (!$purchaseOrderItem) {
            return response()->json(['message' => 'Item pembelian tidak ditemukan'], 404);
        }

        return response()->json($purchaseOrderItem);
    }

    public function store(Request $request)
    {
        // Validasi dan simpan item pembelian baru
        $request->validate([
            'customer_id' => 'required',
            'product_item_id' => 'required',
        ]);

        $purchaseOrderItem = PurchaseOrderItem::create($request->all());

        return response()->json($purchaseOrderItem, 201);
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update item pembelian berdasarkan ID
        $request->validate([
            'customer_id' => 'required',
            'product_item_id' => 'required',
        ]);

        $purchaseOrderItem = PurchaseOrderItem::find($id);

        if (!$purchaseOrderItem) {
            return response()->json(['message' => 'Item pembelian tidak ditemukan'], 404);
        }

        $purchaseOrderItem->update($request->all());

        return response()->json($purchaseOrderItem, 200);
    }

    public function destroy($id)
    {
        // Hapus item pembelian berdasarkan ID
        $purchaseOrderItem = PurchaseOrderItem::find($id);

        if (!$purchaseOrderItem) {
            return response()->json(['message' => 'Item pembelian tidak ditemukan'], 404);
        }

        $purchaseOrderItem->delete();

        return response()->json(['message' => 'Item pembelian berhasil dihapus'], 204);
    }
}
