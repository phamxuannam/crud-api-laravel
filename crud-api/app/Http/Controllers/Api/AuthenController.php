<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function login(AuthenRequest $request){
        
        $user = User::firstWhere('email', $request->email);
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Email khong ton tai.',
                'data'    => null
            ], 404);
        }
        
        $checkPass = Hash::check($request->password, $user->password);
        if($checkPass){
            return response()->json([
                'success' => true,
                'message' => 'Login Thanh Cong.',
                'data'    => new UserResource($user)
            ], 200);
        }
        return response()->json([
                'success' => false,
                'message' => 'Password không đúng.',
                'data'    => null
            ], 404);
    }
}