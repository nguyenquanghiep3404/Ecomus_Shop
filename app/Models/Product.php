<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Quan trọng: Import HasMany
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo nếu cần cho category


class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
    ];

    public function images(): HasMany // <-- PHẢI CÓ PHƯƠNG THỨC NÀY
    {
        // ProductImage::class là model liên quan
        // Laravel sẽ tự động đoán khóa ngoại là product_id
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Định nghĩa quan hệ một-nhiều với ProductComment.
     * Tên "productComments" này phải khớp với tên dùng trong Seeder.
     */
    public function productComments(): HasMany // <-- Kiểm tra xem Seeder có đang dùng tên này không
    {
        return $this->hasMany(ProductComment::class);
    }

    /**
     * Định nghĩa quan hệ với Category (ví dụ)
     */
     public function category(): BelongsTo
     {
         return $this->belongsTo(Category::class);
     }
}
