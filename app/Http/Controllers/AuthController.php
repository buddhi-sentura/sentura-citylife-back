<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{

//    public function register(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|string|email|max:255|unique:users',
//            'name' => 'required',
//            'password'=> 'required'
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json($validator->errors());
//        }
//
//        $user = User::create([
//            'name'    => $request->json()->get('name'),
//            'email'    => $request->json()->get('email'),
//            'password' => Hash::make($request->json()->get('password')),
//        ]);
//
//        $token = JWTAuth::fromUser($user);
//        return response()->json(compact('user','token'),201);
//
////        return $this->respondWithToken($token);
//    }

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

//    public function register(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|string|email|max:255|unique:users',
//            'name' => 'required',
//            'password'=> 'required'
//        ]);
//        if ($validator->fails()) {
//            return response()->json($validator->errors());
//        }
//        User::create([
//            'name' => $request->get('name'),
//            'email' => $request->get('email'),
//            'password' => bcrypt($request->get('password')),
//        ]);
//        $user = User::first();
//        $token = JWTAuth::fromUser($user);
//
//        return Response::json(compact('token'));
//    }
}
