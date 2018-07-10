<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
//use JWTAuth;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth:api', ['except' => ['login']]);
//    }

    public function index()
    {
        return view('main');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
//    public function login()
//    {
//        $credentials = request(['email', 'password']);
//        //try {
//            if (! $token = auth('api')->attempt($credentials)) {
//                return response()->json(['error' => 'invalid_credentials'], 401);
//            }
//        //} catch (JWTException $e) {
//           // return response()->json(['error' => 'could_not_create_token'], 500);
//   // }
//
//        return $this->respondWithToken($token);
//    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
       // return response()->json(compact('credentials'));
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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
            'user' => $this->guard()->user(),
            //'userRole' => $this->guard()->user()->roles,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function guard() {
        return \Auth::Guard('api');
    }
}
