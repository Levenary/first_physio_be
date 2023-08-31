<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class EmployeeController extends Controller
{
    public function index()
    {
        //return 1;
        $employees = Employee::all();
        return response()->json($employees);
    }


    public function store(Request $request)
    {
        //return $request;
        $employee = Employee::create($request->all());
        return response()->json(['message' => 'Employee created successfully.', 'data' => $employee],);
    }

    public function show(Employee $employee)
    {
       //return asu;
       return response()->json($employee);
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return response()->json(['message' => 'Employee updated successfully.', 'data' => $employee]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully.']);
    }
}
