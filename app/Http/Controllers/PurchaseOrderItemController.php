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
    public function transformData()
    {
        // Mengambil data dari model PurchaseOrderItem dengan kolom yang spesifik
        $data = PurchaseOrderItem::with('product_items', 'customer', 'purchase_orders_items')
            ->select('customer_id', 'product_item_id') // Memilih kolom yang diperlukan (ubah sesuai dengan kebutuhan)
            ->get();
    
        // Mengubah format data sesuai dengan kebutuhan
        $transformedData = [];
    
        foreach ($data as $item) {
            $transformedItem = [
                'name' => $item->customer ? $item->customer->name : null, // Menggunakan relasi customer
                'price' => $item->product_items ? $item->product_items->price : null, // Menggunakan relasi product_items
            ];
    
            // Menambahkan data yang telah diformat ke dalam array transformedData
            $transformedData[] = $transformedItem;
        }
    
        // Mengembalikan data dalam bentuk response JSON
        return response()->json($transformedData);
    }
    

}
