<?php

namespace Database\Factories;

use App\Models\Product; // Đảm bảo import đúng Model Product
use App\Models\Category; // Import Model Category để tạo khóa ngoại
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class; // Chỉ định model tương ứng

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true), // Tên sản phẩm gồm 3 từ
            'price' => fake()->numberBetween(10000, 5000000), // Giá ngẫu nhiên trong khoảng
            'description' => fake()->paragraph(), // Mô tả ngẫu nhiên
            'category_id' => Category::factory(), // Tự động tạo hoặc lấy Category liên quan
            // Nếu bạn muốn dùng Category đã tồn tại:
            // 'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
        ];
    }
}
