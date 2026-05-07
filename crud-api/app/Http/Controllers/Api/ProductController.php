<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $getAll = Product::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'Danh Sach Products.',
            'data'    => ProductResource::collection($getAll)
        ], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Khong Ton Tai.',
                'data'    => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Hien Thi Product',
            'data'    => new ProductResource($product)
        ], 200);
    }

    public function store(ProductRequest $request)
    {
        $user = User::find($request->userId);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User Khong Ton Tai.',
                'data'    => null
            ], 404);
        }

        $data = [
            'name'      => $request->name,
            'price'     => $request->price,
            'quantity'  => $request->quantity,
            'userId'    => $request->userId
        ];

        $product = Product::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Tao Product Thanh Cong.',
            'data'    => new ProductResource($product)
        ], 201);
    }

    public function update($id, ProductRequest $request)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Khong Ton Tai.',
                'data'    => null
            ], 404);
        }
        $data = [
            'name'     => $request->name,
            'price'    => $request->price,
            'quantity' => $request->quantity,
            'userId'   => $request->userId
        ];
        $product->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Cap Nhat Product Thanh Cong.',
            'data'    => new ProductResource($product)
        ], 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Khong Ton Tai.',
                'data'    => null
            ], 404);
        }
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Xoa Product Thanh Cong.',
            'data'    => null
        ], 200);
    }
}