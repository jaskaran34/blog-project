<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\http\Resources\UserResource;

class AuthController extends Controller
{
   
    public function user_send(){
        return "sjjs";
    }
    public function register(Request $request)
    {
        try{
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // Create new user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        //return gettype($user);
        // Generate token
        $token = $user->createToken('Api token of '.$user->name)->plainTextToken;
        //$token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => new UserResource($user)
        ], 201);

    }
    catch(Exception $e){
        return $e;
    }
    }

    // Login method
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        //return gettype($user);

        $user->tokens()->delete();

        // Generate token
        //$token = $user->createToken('auth_token')->plainTextToken;
        $token = $user->createToken('Api token of '.$user->name)->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => new UserResource($user)
        ]);
    }

    // Logout method
    public function logout(Request $request)
    {
        //return $headers = $request->headers->all();
        
        // Revoke the user's current token
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
        
    }


    //end class
}
