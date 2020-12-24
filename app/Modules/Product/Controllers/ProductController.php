<?php

namespace App\Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Requests\ProductRequest;
use ProductService;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Список товаров';
        $products = ProductService::all();

        $this->view('product::index');

        return $this->render(compact('products', 'title'));
    }

    public function create()
    {
        $categories = Category::all();
        $title = 'Добавление товара';

        $this->view('product::create');

        return $this->render(compact('title', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        $result = ProductService::create($request);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('product.index')->with($result);

    }

    public function edit(Product $product)
    {
        $title = 'Редактирование товара';
        $categories = Category::all();
        $this->view('product::edit');

        return $this->render(compact('categories', 'product', 'title'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $result = ProductService::update($request, $product);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('product.index')->with($result);
    }

    public function destroy(Product $product)
    {
        $result = ProductService::destroy($product);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('product.index')->with($result);
    }
}
