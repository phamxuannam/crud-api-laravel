<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index(){

        $getAll = User::latest()->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Danh Sach User.',
            'data'    => UserResource::collection($getAll)
        ], 200);
    }

    public function show($id){

        $user = User::find($id);
        
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'User Khong Ton Tai.',
                'data'    => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Hien Thi User.',
            'data'    => new UserResource($user)
        ], 200);
        
    }

    public function store(UserRequest $request){

        $data = [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'age'      => $request->age
        ];

        $user = User::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Tao User Thanh Cong.',
            'data'    => new UserResource($user)
        ], 201);
    }

    public function update($id, UserRequest $request){
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'User Khong Ton Tai.',
                'data'    => null
            ], 404);
        }
        $data = [
            'name'     => $request->name,
            'password' => $request->password,
            'age'      => $request->age 
        ];

        $user->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Cap Nhat User Thanh Cong',
            'data'    => new UserResource($user)
        ], 200);
    }

    public function destroy($id){

        $user = User::find($id);

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'User Khong Ton Tai.',
                'data'    => null
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xoa User Thanh Cong.',
            'data'    => null
        ], 200);
    }
}