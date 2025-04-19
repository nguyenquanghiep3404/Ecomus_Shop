<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function listProduct()
    {
        $listProduct = Product::with(['images:id,product_id,image_url', 'category:id,name'])->paginate(10);
        return response()->json($listProduct, 200);
    }

    public function addProduct(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required|exists:categories,id',
            'description' => 'present',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::create([
            'name' => $req->name,
            'price' => $req->price,
            'category_id' => $req->category,
            'description' => $req->description,
        ]);

        if ($req->hasFile('images')) {
            foreach ($req->file('images') as $key => $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('imageProducts'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => 'imageProducts/' . $imageName,
                    'image_type' => $key == 0 ? 'main' : 'secondary'
                ]);
            }
        }

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $images = ProductImage::where('product_id', $id)->get();

        foreach ($images as $img) {
            File::delete(public_path($img->image_url));
        }

        ProductImage::where('product_id', $id)->delete();
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function updateProduct(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required|exists:categories,id',
            'description' => 'present',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update([
            'name' => $req->name,
            'price' => $req->price,
            'category_id' => $req->category,
            'description' => $req->description,
        ]);

        if ($req->hasFile('images')) {
            $oldImages = ProductImage::where('product_id', $id)->get();
            foreach ($oldImages as $img) {
                File::delete(public_path($img->image_url));
            }
            ProductImage::where('product_id', $id)->delete();

            foreach ($req->file('images') as $key => $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('imageProducts'), $imageName);

                ProductImage::create([
                    'product_id' => $id,
                    'image_url' => 'imageProducts/' . $imageName,
                    'image_type' => $key == 0 ? 'main' : 'secondary'
                ]);
            }
        }

        return response()->json(['message' => 'Product updated successfully']);
    }

    public function showProduct($idProduct)
    {
        $product = Product::with(['category', 'images'])->find($idProduct);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    public function getCategories()
    {
        return response()->json(Category::all());
    }
}
