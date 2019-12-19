<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserContraller extends Controller
{

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard();
    }

    public function register(Request $request)
    {

        echo "register method";
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'    => $request->json()->get('name'),
            'email'    => $request->json()->get('email'),
            'password' => Hash::make($request->json()->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user','token'),201);

//        return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
        $credentials = $request->json()->all();

        try {
            if ($token = $this->guard()->attempt($credentials)) {
                return $this->respondWithToken($token);
            }
        }catch (JWTException $e){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(compact('token'));
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
