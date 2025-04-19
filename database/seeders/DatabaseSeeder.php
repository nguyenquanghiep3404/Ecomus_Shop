<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductImage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // \App\Models\Category::factory(5)->create(); // Bỏ comment nếu muốn tạo Category

        Product::factory(20)
        // Nếu phương thức trong Model là images():
        ->has(ProductImage::factory()->count(3), 'images') // <--- Tên phải là 'images'

        // Nếu phương thức trong Model là productImages():
        // ->has(ProductImage::factory()->count(3), 'productImages') // <--- Tên phải là 'productImages'

        // Tương tự, kiểm tra tên quan hệ cho comments
        ->has(ProductComment::factory()->count(5), 'productComments') // <--- Đảm bảo tên này khớp với phương thức trong Model Product

        ->create();
}
}
