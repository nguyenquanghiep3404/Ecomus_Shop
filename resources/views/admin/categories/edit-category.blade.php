@extends('admin.layouts.main')

@section('title')
    @parent
    Chỉnh sửa danh mục
@endsection

@push('style')
{{-- Thêm CSS nếu cần --}}
@endpush

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-30">
        <h3>Chỉnh sửa danh mục</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li>
                <a href="{{ route('admin.dashbroad') }}"><div class="text-tiny">Dashboard</div></a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <a href="{{ route('admin.category.listCategory') }}"><div class="text-tiny">Danh mục</div></a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">Chỉnh sửa</div>
            </li>
        </ul>
    </div>

    <div class="wg-box">
        @if(session('success'))
        <div class="alert alert-success mb-20">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger mb-20">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form action="{{ route('admin.category.updatePostCategory', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="name">Tên danh mục:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
            </div>
            <button type="submit">Cập nhật danh mục</button>
        </form>
    </div>
</div>
@endsection

@push('script')
{{-- Thêm JS nếu cần --}}
@endpush