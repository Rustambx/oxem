<?php

namespace App\Modules\Product\Services;

use App\Modules\Product\Models\Product;
use App\Modules\Product\Requests\ProductRequest;

class ProductService
{
    public function all ()
    {
        $products = Product::all();

        return $products;
    }

    public function create (ProductRequest $request)
    {
        $data = $request->except('_token', 'categories');
        $categories = $request->input('categories');

        if ($product = Product::create($data)) {
            $product->categories()->attach($categories);
            return ['status' => 'Товар добавлен'];
        } else {
            return ['error' => 'Ошибка при сохранении'];
        }
    }

    public function update (ProductRequest $request, Product $product)
    {
        $data = $request->except('_method', '_token', 'categories');

        $categories = $request->input('categories');

        if ($product->update($data)) {
            $product->categories()->sync($categories);
            return ['status' => 'Товар обновлен'];
        } else {
            return ['error' => 'Ошибка при сохранении'];
        }
    }

    public function destroy (Product $product)
    {
        if ($product->delete()) {
            $product->categories()->detach();
            return ['status' => 'Товар удален'];
        } else {
            return ['error' => 'Ошибка при удалении'];
        }
    }
}
