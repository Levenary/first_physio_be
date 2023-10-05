<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;



class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::join('users', 'users.role_id', '=', 'roles.id')
        ->get();
        return response()->json($roles);
    }

    public function show($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        return response()->json($role);

    }

}