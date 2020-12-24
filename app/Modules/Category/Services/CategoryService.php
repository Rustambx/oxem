<?php

namespace App\Modules\Category\Services;

use App\Modules\Category\Models\Category;
use App\Modules\Category\Requests\CategoryRequest;

class CategoryService
{
    public function all ()
    {
        $categories = Category::all();

        return $categories;
    }

    public function create (CategoryRequest $request)
    {
        $data = $request->except('_token');

        if (Category::create($data)) {
            return ['status' => 'Категория добавлена'];
        } else {
            return ['error' => 'Ошибка при добавлении'];
        }
    }

    public function update (CategoryRequest $request, Category $category)
    {
        $data = $request->except('_method', '_token');

        if ($category->update($data)) {
            return ['status' => 'Категория обновлена'];
        } else {
            return ['error' => 'Ошибка при сохранении'];
        }
    }

    public function destroy (Category $category)
    {
        if ($category->delete()) {
            return ['status' => 'Категория удалена'];
        } else {
            return ['error' => 'Ошибка при удалении'];
        }
    }
}
