@extends('admin.layouts.main')

@section('title')
    @parent
    Chi tiết sản phẩm
@endsection

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-30">
                <h3>Chi tiết sản phẩm</h3>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.dashbroad') }}">Dashboard</a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('admin.products.listProduct') }}">Sản phẩm</a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><span>{{ $value->name }}</span></li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="product-detail-header mb-30">
                    <div class="flex items-start gap20">
                        <!-- Ảnh chính -->
                        @if ($value->images->isNotEmpty())
                            <div class="main-image">
                                <img src="{{ asset($value->images[0]->image_url) }}" alt="Ảnh chính" class="img-fluid"
                                    style="max-width: 400px; border-radius: 8px;">
                            </div>
                        @endif

                        <div class="product-info flex-grow-1">
                            <h1 class="product-name mb-15">{{ $value->name }}</h1>
                            <div class="price-section mb-15">
                                <span class="price-label">Giá:</span>
                                <span class="price-value">{{ number_format($value->price) }} VND</span>
                            </div>
                            <div class="category-section mb-15">
                                <span class="category-label">Danh mục:</span>
                                <span class="category-value">{{ $value->category->name }}</span>
                            </div>
                            <div class="action-buttons">
                                <a href="{{ route('admin.products.updateProduct', $value->id) }}" class="tf-button mr-10">
                                    <i class="icon-edit"></i> Chỉnh sửa
                                </a>
                                <form action="{{ route('admin.products.deleteProduct') }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Bạn chắc chắn muốn xoá sản phẩm này?')">
                                    @csrf
                                    <input type="hidden" name="idProduct" value="{{ $value->id }}">
                                    <button type="submit" class="tf-button style-3">
                                        <i class="icon-trash"></i> Xoá
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phần ảnh phụ -->
                @if ($value->images->count() > 1)
                    <div class="secondary-images mb-30">
                        <h4 class="section-title mb-20">Ảnh phụ</h4>
                        <div class="image-grid">
                            @foreach ($value->images->slice(1) as $image)
                                <div class="image-item">
                                    <img src="{{ asset($image->image_url) }}" alt="Ảnh phụ {{ $loop->iteration }}"
                                        class="img-thumbnail">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Phần mô tả -->
                <div class="description-section mb-30">
                    <h4 class="section-title mb-20">Mô tả sản phẩm</h4>
                    <div class="description-content">
                        {!! nl2br(e($value->description)) !!}
                    </div>
                </div>

                <!-- Thông tin meta -->
                <div class="meta-section">
                    <div class="meta-item">
                        <span class="meta-label">Ngày tạo:</span>
                        <span class="meta-value">{{ $value->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Lần cập nhật cuối:</span>
                        <span class="meta-value">{{ $value->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        /* Tổng thể */
        .product-detail-header {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        /* Phần ảnh chính */
        .main-image {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .main-image img {
            transition: transform 0.3s ease;
            display: block;
            width: 100%;
            height: auto;
        }

        .main-image:hover img {
            transform: scale(1.03);
        }

        /* Thông tin sản phẩm */
        .product-info {
            padding-left: 30px;
        }

        .product-name {
            font-size: 2.2rem;
            color: #2d3436;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .price-section {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .price-label {
            color: #636e72;
            margin-right: 10px;
        }

        .price-value {
            color: #e74c3c;
            font-weight: 700;
        }

        .category-section {
            font-size: 1.1rem;
            color: #636e72;
            margin-bottom: 25px;
        }

        /* Nút hành động */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .tf-button {
            padding: 12px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tf-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Ảnh phụ */
        .secondary-images {
            margin-top: 40px;
            padding: 25px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }

        .image-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .image-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border: 2px solid #f8f9fa;
            transition: all 0.3s ease;
        }

        .image-item:hover img {
            transform: scale(1.05);
            border-color: #3498db;
        }

        /* Phần mô tả */
        .description-section {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin: 30px 0;
        }

        .description-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #2d3436;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        /* Meta thông tin */
        .meta-section {
            display: flex;
            gap: 40px;
            padding: 25px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-top: 30px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            color: #636e72;
        }

        .meta-label {
            font-weight: 500;
            margin-right: 10px;
            color: #2d3436;
        }

        .meta-value {
            color: #3498db;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .flex.items-start {
                flex-direction: column;
            }

            .product-info {
                padding-left: 0;
                margin-top: 25px;
            }

            .product-name {
                font-size: 1.8rem;
            }

            .image-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .meta-section {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
@endpush
