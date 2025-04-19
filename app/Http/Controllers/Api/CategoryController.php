<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // Lấy danh sách tất cả danh mục
    public function listCategory()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    // Thêm danh mục mới
    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Danh mục đã được thêm thành công',
            'category' => $category,
        ], 201);
    }

    // Lấy thông tin 1 danh mục cụ thể
    public function getCategory($idCategory)
    {
        $category = Category::find($idCategory);

        if (!$category) {
            return response()->json(['message' => 'Không tìm thấy danh mục'], 404);
        }

        return response()->json($category);
    }

    // Cập nhật danh mục
    public function updateCategory(Request $request, $idCategory)
    {
        $category = Category::find($idCategory);

        if (!$category) {
            return response()->json(['message' => 'Không tìm thấy danh mục'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category->name = $request->name;
        $category->save();

        return response()->json([
            'message' => 'Danh mục đã được cập nhật thành công',
            'category' => $category
        ]);
    }

    // Xoá danh mục
    public function deleteCategory($idCategory)
    {
        $category = Category::find($idCategory);

        if (!$category) {
            return response()->json(['message' => 'Không tìm thấy danh mục'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Danh mục đã được xoá thành công']);
    }
}