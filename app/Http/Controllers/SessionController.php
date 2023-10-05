<?php

// File: SessionController.php
namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return Session::all();
    }

    public function show($id)
    {
        return Session::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Session::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $session = Session::findOrFail($id);
        $session->update($request->all());

        return $session;
    }

    public function destroy($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();

        return response()->json(null, 204);
    }

    public function getByEmployeeId($employeeId)
{
    if (!is_numeric($employeeId) || $employeeId <= 0) {
        return response()->json(['message' => 'Invalid employee ID'], 400);
    }

    $sessions = Session::with(['employee'])  // Mengubah "purchaseOrder" menjadi "Session"
        ->where('employee_id', $employeeId)
        ->get();

    if ($sessions->count() === 0) {
        return response()->json(['message' => 'Data not found for employee ID: ' . $employeeId], 404);
    }

    // Proses data sesuai kebutuhan jika diperlukan

    return response()->json($sessions);
}

}
