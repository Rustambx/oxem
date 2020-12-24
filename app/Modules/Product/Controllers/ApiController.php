<?php

namespace App\Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Requests\ProductRequest;
use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['productList', 'categoryProducts', 'showProduct']]);
    }

    public function productList (Request $request)
    {
        $products = DB::table('products')->
            orderBy('price', $request->input('price'))->
            orderBy('created_at', $request->input('created_at'))->
            paginate(50);

        return response()->json([
            "success" => true,
            "payload" => $products,
        ]);
    }

    public function categoryProducts (Request $request)
    {
        $category = Category::where('name', $request->input('name'))->first();

        return response()->json([
            "success" => true,
            "payload" => $category->products,
        ]);
    }

    public function showProduct (Request $request)
    {
        $product = Product::where('name', $request->input('name'))->first();

        return response()->json([
            "success" => true,
            "payload" => $product,
        ]);
    }

    public function createProduct (ProductRequest $request)
    {
        $data = $request->except('categories');
        $categories = $request->input('categories');
        $product = Product::create($data);
        if ($product) {
            $product->categories()->attach($categories);
            return response()->json([
                "success" => true,
                "payload" => $product->id,
            ]);
        } else {
            return response()->json([
                "success" => false,
                "payload" => "Ошибка при сохранении",
            ]);
        }
    }

    public function deleteProduct (Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);
        if ($product->delete()) {
            $product->categories()->detach();
            return response()->json([
                "success" => true,
                "payload" => 'Продукт удален',
            ]);
        } else {
            return response()->json([
                "success" => false,
                "payload" => "Ошибка при удалении",
            ]);
        }
    }
}
