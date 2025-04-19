{{-- resources/views/admin/products/update.blade.php --}}
@extends('admin.layouts.main')

@section('title')
    @parent
    Cập nhật sản phẩm
@endsection

@push('style')
    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            color: #dc3545;
            display: block;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
        .existing-images img {
            max-width: 100px;
            margin: 5px;
            border: 1px solid #ddd;
            padding: 2px;
        }
    </style>
@endpush

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-30">
                <h3>Cập nhật sản phẩm</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="#">
                            <div class="text-tiny">Dashboard</div>
                        </a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="#">
                            <div class="text-tiny">Sản phẩm</div>
                        </a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li>
                        <div class="text-tiny">Cập nhật</div>
                    </li>
                </ul>
            </div>

            @if($errors->any())
                <div class="alert alert-danger mb-30">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-update-product" action="{{ route('admin.products.updatePatchProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="idProduct" value="{{ $product->id }}">

                <div class="wg-box mb-30">
                    <fieldset>
                        <div class="body-title mb-10">Ảnh sản phẩm <span class="tf-color-1">*</span></div>
                        <div class="upload-image mb-16">
                            <div class="up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon"><i class="icon-upload-cloud"></i></span>
                                    <div class="text-tiny">Thả ảnh hoặc <span class="text-secondary">click để chọn</span></div>
                                    <input type="file" id="myFile" name="images[]" multiple accept="image/*">
                                </label>
                                @error('images.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="body-text mt-10">Upload ảnh mới sẽ thay thế toàn bộ ảnh cũ</div>
                            
                            <!-- Hiển thị ảnh hiện tại -->
                            <div class="existing-images mt-20">
                                <div class="body-title mb-10">Ảnh hiện tại</div>
                                <div class="flex gap20 flex-wrap">
                                    @foreach($product->images as $image)
                                        <img src="{{ asset($image->image_url) }}" alt="Ảnh sản phẩm">
                                    @endforeach
                                </div>
                            </div>
                            
                            <!-- Preview ảnh mới -->
                            <div class="flex gap20 flex-wrap mt-20" id="image-preview-container"></div>
                        </div>
                    </fieldset>
                </div>

                <div class="wg-box mb-30">
                    <fieldset class="name">
                        <div class="body-title mb-10">Tên sản phẩm <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Nhập tên sản phẩm" 
                               name="name" value="{{ old('name', $product->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="category">
                        <div class="body-title mb-10">Danh mục <span class="tf-color-1">*</span></div>
                        <select name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="price">
                        <div class="body-title mb-10">Giá tiền <span class="tf-color-1">*</span></div>
                        <input type="number" placeholder="Giá" name="price" step="0.01"
                               value="{{ old('price', $product->price) }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="description">
                        <div class="body-title mb-10">Mô tả <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10" name="description" placeholder="Mô tả sản phẩm" 
                                  rows="5">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </fieldset>
                </div>

                <div class="cols gap10">
                    <button class="tf-button w380" type="submit">Cập nhật sản phẩm</button>
                    <a href="{{ route('admin.products.listProduct') }}" class="tf-button style-3 w380">Huỷ</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('myFile');
            const previewContainer = document.getElementById('image-preview-container');
            
            if (fileInput && previewContainer) {
                fileInput.addEventListener('change', function (event) {
                    previewContainer.innerHTML = '';
                    const files = event.target.files;
                    
                    if (files) {
                        Array.from(files).forEach(file => {
                            if (file.type.startsWith('image/')) {
                                const reader = new FileReader();
                                reader.onload = function (e) {
                                    const imgItem = document.createElement('div');
                                    imgItem.classList.add('item');
                                    const img = document.createElement('img');
                                    img.src = e.target.result;
                                    img.alt = file.name;
                                    img.style.maxWidth = '100px';
                                    img.style.maxHeight = '100px';
                                    imgItem.appendChild(img);
                                    previewContainer.appendChild(imgItem);
                                }
                                reader.readAsDataURL(file);
                            }
                        });
                    }
                });
            }
        });
    </script>
    
    @if(session('message'))
    <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1050;">
        <div class="toast show bg-white border-success" role="alert">
            <div class="d-flex align-items-center p-3">
                <div class="toast-body fs-5 text-success">
                    {{ session('message') }}
                </div>
                <button type="button" class="btn-close me-2" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>
    @endif
@endpush