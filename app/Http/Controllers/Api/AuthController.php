<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validation = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ],[
            'name.required' => 'name is required.',
            'email.required' => 'email is required.',
        ]);

        if($validation->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validation->errors(),
            ],401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken('API TOKEN')->plainTextToken,
        ],200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message'   => $th->getMessage(),
            ],401);
        }
        
    }

    public function login(Request $request){
        try {

            $validation = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required'
            ],[
                'email.required' => 'email is required.',
                'password.required' => 'password is required.',
            ]);
    
            if($validation->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Login Error',
                    'errors' => $validation->errors(),
                ],401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Login Error',
                    'errors' => $validation->errors(),
                ],401);
            }
            
            $user = User::where('email', $request->email)->first();
            return response()->json([
                'status' => true,
                'message' => 'User Login Successfully',
                'token' => $user->createToken('API TOKEN')->plainTextToken,
            ],200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message'   => $th->getMessage(),
            ],401);
        }
    }
}
