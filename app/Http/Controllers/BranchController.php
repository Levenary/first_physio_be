<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return response()->json($branches);
    }

    public function store(Request $request)
    {
        $branch = Branch::create($request->all());
        return response()->json($branch, 201);
    }

    public function show(Branch $branch)
    {
        return response()->json($branch);
    }

    public function update(Request $request, Branch $branch)
    {
        $branch->update($request->all());
        return response()->json($branch);
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return response()->json(['message' => 'Branch deleted successfully.']);
    }

    public function showBranches()
    {
        // Mengambil data cabang dengan kolom name, phone, address, dan is_active
        $branches = Branch::select('name', 'phone', 'address', 'is_active')->get();
        
        // Mengembalikan data dalam bentuk response JSON
        return response()->json($branches);
    }
}