<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Resources\PermissionResource;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


use App\Models\User;
use App\Models\AuthenticationLog;

use App\Events\UserLogin;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
           
            return response()->json([
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $log = new AuthenticationLog();

        // Dispath the User Login Event
        $info = [
            "ip_address"=>$request->ip(),
            "email" => $data['email'],
            "token" => $token,
            "action" => "login",
            "status" => "success",
        ];
        
        UserLogin::dispatch($log,$info);
    
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);

    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
        
    }
}
