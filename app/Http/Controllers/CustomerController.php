<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        return response()->json($customer, 201);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(['message' => 'Customer deleted successfully.']);
    }

    public function purchaseOrderItems($customerId)
{
    $customer = Customer::findOrFail($customerId);
    $customerData = [
        'customer_id' => $customer->id,
        'name' => $customer->name,
        'nik' => $customer->nik,
        'address' => $customer->address,
        'email' => $customer->email,
        'phone' => $customer->phone
    ];

    return response()->json($customerData);
}

public function showCustomers()
    {
        // Mengambil data pelanggan dengan kolom name, email, dan is_active
        $customers = Customer::select('name', 'email', 'is_active')->get();
        
        // Mengembalikan data dalam bentuk response JSON
        return response()->json($customers);
    }
}
