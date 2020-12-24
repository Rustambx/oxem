<?php

namespace App\Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Category\Requests\CategoryRequest;
use CategoryService;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Список категории';
        $categories = CategoryService::all();

        $this->view('category::index');

        return $this->render(compact('categories', 'title'));
    }

    public function create()
    {
        $categories = Category::all();
        $title = 'Добавление категории';

        $this->view('category::create');

        return $this->render(compact('title', 'categories'));
    }

    public function store(CategoryRequest $request)
    {
        $result = CategoryService::create($request);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('category.index')->with($result);

    }

    public function edit(Category $category)
    {
        $title = 'Редактирование категории';
        $categories = Category::all();
        $this->view('category::edit');

        return $this->render(compact('categories', 'category', 'title'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $result = CategoryService::update($request, $category);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('category.index')->with($result);
    }

    public function destroy(Category $category)
    {
        $result = CategoryService::destroy($category);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('category.index')->with($result);
    }
}
