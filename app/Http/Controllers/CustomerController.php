<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    // Menambahkan pelanggan baru
    public function store(Request $request)
    {
        //return $request;
        $data = $request->validate([
            'name' => 'required|string',
            'nik' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string'
        ]);
//return $data;
         $customer = Customer::create($request->all());

        return BaseController::success($result, 'Berhasil Membuat Akun');
    }

    // Menampilkan detail pelanggan
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    // Mengupdate informasi pelanggan
    public function update(Request $request, Customer $customer)
    {
        return 1;
        $data = $request->validate([
            'name' => 'string',
            'nik' => 'string',
            'address' => 'string',
            'email' => 'email|unique:customers,email,' . $customer->id,
            'phone' => 'string',
        ]);

        $customer->update($data);

        return response()->json(['message' => 'Customer updated successfully', 'customer' => $customer]);
    }

    // Menghapus pelanggan
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
