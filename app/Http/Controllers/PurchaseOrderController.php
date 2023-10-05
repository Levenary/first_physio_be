<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\Session;

class PurchaseOrderController extends Controller
{

    public function index()
    {
        $purchaseOrders = PurchaseOrder::all();
        return response()->json($purchaseOrders);
    }

    public function show($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if (!$purchaseOrder) {
            return response()->json(['message' => 'Pembelian tidak ditemukan'], 404);
        }
        return response()->json($purchaseOrder);
    }

    public function getByCustomerId($customerId)
    {
        if (!is_numeric($customerId) || $customerId <= 0) {
            return response()->json(['message' => 'Invalid customer ID'], 400);
        }

        $purchaseOrders = PurchaseOrder::with(['customer'])
            ->where('customer_id', $customerId)
            ->get();

        if ($purchaseOrders->count() === 0) {
            return response()->json(['message' => 'Data not found for customer ID: ' . $customerId], 404);
        }

        return response()->json($purchaseOrders);
    }

    public function getByProductId($productId)
    {
        if (!is_numeric($productId) || $productId <= 0) {
            return response()->json(['message' => 'Invalid product ID'], 400);
        }

        $purchaseOrders = PurchaseOrder::with(['product'])
            ->where('product_id', $productId)
            ->get();

        if ($purchaseOrders->count() === 0) {
            return response()->json(['message' => 'Data not found for product ID: ' . $productId], 404);
        }

        return response()->json($purchaseOrders);
    }


    public function getByEmployeeId($employeeId)
    {
        if (!is_numeric($employeeId) || $employeeId <= 0) {
            return response()->json(['message' => 'Invalid employee ID'], 400);
        }

        $sessions = Session::with(['employee'])
            ->where('employee_id', $employeeId)
            ->get();

        if ($sessions->count() === 0) {
            return response()->json(['message' => 'Data not found for employee ID: ' . $employeeId], 404);
        }

        // Proses data sesuai kebutuhan jika diperlukan

        return response()->json($sessions);
    }

    public function getByBranchId($branchId)
    {
        if (!is_numeric($branchId) || $branchId <= 0) {
            return response()->json(['message' => 'Invalid branch ID'], 400);
        }

        $purchaseOrders = PurchaseOrder::with(['branch'])
            ->where('branch_id', $branchId)
            ->get();

        if ($purchaseOrders->count() === 0) {
            return response()->json(['message' => 'Data not found for branch ID: ' . $branchId], 404);
        }

        return response()->json($purchaseOrders);
    }

    public function getByPurchaseOrderIdFromSession()
{
    $purchaseOrderId = session()->get('purchase_order_id');

    if (!is_numeric($purchaseOrderId) || $purchaseOrderId <= 0) {
        return response()->json(['message' => 'Invalid purchase order ID'], 400);
    }

    $purchaseOrder = PurchaseOrder::with(['sessionData'])->find($purchaseOrderId);

    if (!$purchaseOrder) {
        return response()->json(['message' => 'Purchase order not found for ID: ' . $purchaseOrderId], 404);
    }

    // Anda dapat mengakses data sesi terkait dengan purchase order seperti ini
    $sessionData = $purchaseOrder->sessionData;

    return response()->json($sessionData);
}

    
}
