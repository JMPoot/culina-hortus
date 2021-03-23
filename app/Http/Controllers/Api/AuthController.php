<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(null, Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'access_token' => $user->createToken('user-access')->plainTextToken
        ]);
    }

    public function revoke(User $user) 
    {
        $user->tokens()->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
