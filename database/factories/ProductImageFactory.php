<?php

namespace Database\Factories;

use App\Models\ProductImage; // Đảm bảo import đúng Model ProductImage
use App\Models\Product;     // Import Model Product để tạo khóa ngoại
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImage::class; // Chỉ định model tương ứng

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(), // Tự động tạo hoặc lấy Product liên quan
            // Nếu bạn muốn dùng Product đã tồn tại:
            // 'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(),
            'image_url' => fake()->imageUrl(640, 480, 'products', true), // Tạo URL ảnh giả
            'image_type' => fake()->randomElement(['main', 'secondary']), // Chọn ngẫu nhiên loại ảnh
        ];
    }
}
