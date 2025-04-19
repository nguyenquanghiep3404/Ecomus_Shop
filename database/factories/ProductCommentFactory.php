<?php

namespace Database\Factories;

use App\Models\ProductComment; // Đảm bảo import đúng Model ProductComment
use App\Models\Product;       // Import Model Product
use App\Models\User;         // Import Model User
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductComment>
 */
class ProductCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductComment::class; // Chỉ định model tương ứng

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(), // Tự động tạo hoặc lấy Product liên quan
            // 'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(),
            'user_id' => User::factory(), // Tự động tạo hoặc lấy User liên quan
            // 'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'vote_star' => fake()->randomElement(['1', '2', '3', '4', '5']), // Chọn số sao ngẫu nhiên
            'comment' => fake()->sentence(), // Tạo một câu bình luận ngẫu nhiên
        ];
    }
}
