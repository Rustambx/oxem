<?php

namespace App\Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Category\Requests\CategoryRequest;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['categoryList']]);
    }

    public function categoryList ()
    {
        $categories = Category::all();
        if ($categories) {
            return response()->json([
                "success" => true,
                "payload" => $categories,
            ]);
        } else {
            return response()->json([
                "success" => false,
                "payload" => "Ошибка",
            ]);
        }
    }

    public function createCategory (CategoryRequest $request)
    {
        $data = $request->all();
        $category = Category::create($data);
        if ($category) {
            return response()->json([
                "success" => true,
                "payload" => $category->id,
            ]);
        } else {
            return response()->json([
                "success" => false,
                "payload" => "Ошибка при сохранении",
            ]);
        }
    }

    public function updateCategory (CategoryRequest $request)
    {
        $id = $request->input('id');
        $category = Category::find($id);
        $data = $request->except('id');
        if ($category->update($data)) {
            return response()->json([
                "success" => true,
                "payload" => $category->id,
            ]);
        } else {
            return response()->json([
                "success" => false,
                "payload" => "Ошибка при сохранении",
            ]);
        }
    }

    public function deleteCategory (Request $request)
    {
        $id = $request->input('id');
        $category = Category::find($id);
        if ($category->delete()) {
            return response()->json([
                "success" => true,
                "payload" => 'Категория удалена',
            ]);
        } else {
            return response()->json([
                "success" => false,
                "payload" => "Ошибка при сохранении",
            ]);
        }
    }
}
