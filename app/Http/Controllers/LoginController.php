<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginFunction(Request $request)
    {
        
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        // Check if login is successful with email
        //return $credentials;
        if (!Auth::attempt($credentials)) {
            // Attempt login with username
            $user = User::where('email', $request->input('email'))
                ->first();

                //return $user->password;
            if (!$user || Hash::check($request->input('password'), $user->password)) {
                return BaseController::error(NULL, 'UnAuthorized', 400);
            }
        }

        try {
        

            if ($user == NULL) {
                return BaseController::error(NULL, 'User needs verification', 400);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            $accessToken = [
                "accessToken" => $token
            ];

            $result = [
                "sanctum" => $accessToken,
                "user" => $user,
            ];
        } catch (\Throwable $th) {
            throw $th;
        }

        return BaseController::success($result, 'Authorized');
    }
    
    
    public function logOutFunction()
    {
        try {
            $logout = auth()->user()->tokens()->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return BaseController::success("", 'Berhasil logged out');
    }
    public function profileFunction()
    {
        $user = auth('sanctum')->user();

        return BaseController::success($user, "Berhasil mengambil data user");
    }

    public function purchaseOrder($userId)
{
    $user = User::findOrFail($userId);
    $userData = [
        'user_id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
    ];

    return response()->json($userData);
}
}
