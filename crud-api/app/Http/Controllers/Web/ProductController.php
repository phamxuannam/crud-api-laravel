<?php

namespace App\Http\Controllers\Web;


use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::latest()->paginate(5);

        // if ($request->ajax()) {
        // //  return view('web.products._table', compact('products'))->render();

        //     return response()->json([
        //         'rows' => view('web.products._rows', compact('products'))->render(),
        //         'pagination' => $products->links()->toHtml()
        //     ]);
        // }
        return view('web.products.index', compact('products'));
    }

    public function fetch()
    {
        $products = Product::latest()->paginate(5);

        return view('web.products.products-data', compact('products'))->render();
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.products.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = ([
            'name'     => $request->name,
            'price'    => $request->price,
            'quantity' => $request->quantity,
            'userId'   => Auth::id()
        ]);
        $product = Product::create($data);
        //    return redirect()->route('products.index');

        return response()->json([
            'message' => 'Tạo thành công.',
            'product' => $product,
            'delete_url' => route('products.destroy', $product->id),
            'edit_url'   => route('products.edit', $product->id)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('web.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('web.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    //
    public function update(ProductRequest $request, Product $product)
    {

        $data = ([
            'name'  => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'userId'   => $request->userId
        ]);
        $product->update($data);

        // return redirect()->route('products.index', $product);

        return response()->json([
            'message' => 'Cập nhật thành công.',
            'data'    => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Request $request)
    {
        $product->delete();

        // if ($request->ajax()) {
        //     return response()->json([
        //         'message' => 'deleted successfully.'
        //     ]);
        // }
        // return redirect(route('products.index'));

        return response() -> json([
            'message' => 'Xóa thành công.'
        ]);
    }
}
