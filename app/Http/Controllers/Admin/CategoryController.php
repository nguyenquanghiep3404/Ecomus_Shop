<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Hiển thị danh sách danh mục
    public function listCategory()
    {
        $categories = Category::all();
        return view('admin.categories.list-category', ['categories' => $categories]);
    }

    // Hiển thị form thêm danh mục mới
    public function getAddCategory()
    {
        return view('admin.categories.add-category');
    }

    // Xử lý thêm danh mục mới
    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.category.listCategory')->with('success', 'Danh mục đã được thêm thành công');
    }

    // Hiển thị form cập nhật danh mục
    public function updateCategory($idCategory)
    {
        $category = Category::findOrFail($idCategory);
        return view('admin.categories.edit-category', ['category' => $category]);
    }

    // Xử lý cập nhật danh mục
    public function updatePostCategory(Request $request)
    {
        $idCategory = $request->route('idCategory');
        $category = Category::findOrFail($idCategory);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.listCategory')->with('success', 'Danh mục đã được cập nhật thành công');
    }
    public function deleteCategory($idCategory)
{
    $category = Category::findOrFail($idCategory);
    $category->delete();

    return redirect()->route('admin.category.listCategory')->with('success', 'Danh mục đã được xóa thành công');
}
}