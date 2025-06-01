<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $valiidated = $request->validated();

        $user = User::create([
            'name' => $valiidated['name'],
            'email' => $valiidated['email'],
            'password' => Hash::make($valiidated['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
        ], 200);
    }

    public function login(LoginRequest $request)
    {
        $valiidated = $request->validated();

        $user = User::firstWhere('email', $valiidated['email']);

        if (!$user || !Hash::check($valiidated['password'], $user->password)) {
            return response()->json([
                'message' => 'Неверные данные для авторизации.',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Пользователь вышел из системы'
        ], 200);
    }
}
