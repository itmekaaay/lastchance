<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $token) {
        if (Auth::attempt($token->only(['email', 'password']))) {
            return response([
                'message' => '\Successful!',
                'token' => Auth::user()->createToken('token')->plainTextToken
            ], 200);
        } else {
            return response([
                'message' => 'Failed!'
            ], 400);
        }
    }
}
