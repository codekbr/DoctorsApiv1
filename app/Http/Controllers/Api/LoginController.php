<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//jwt
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class LoginController extends Controller
{
   

    public function __construct()
    {
      
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');            
        if(! $token = Auth::guard()->attempt($credentials)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }else{           
            return $this->respondWithToken($token);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
       ]);
    }
}