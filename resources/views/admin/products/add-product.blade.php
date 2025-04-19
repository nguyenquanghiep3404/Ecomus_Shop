@extends('admin.layouts.main')

@section('title')
    @parent
    Thêm mới danh mục
@endsection

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-30">
        <h3>Thêm mới danh mục</h3>
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
                <div class="text-tiny">Thêm mới</div>
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

        <form action="{{ route('admin.category.addCategory') }}" method="POST">
            @csrf

            <div class="wg-group">
                <label class="body-title">Tên danh mục <span class="required">*</span></label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="name" 
                    value="{{ old('name') }}"
                    required
                    placeholder="Nhập tên danh mục"
                    autofocus
                >
                <small class="form-text text-muted">Tối đa 255 ký tự</small>
            </div>

            <div class="mt-30 flex justify-between gap10 flex-wrap">
                <a href="{{ route('admin.category.listCategory') }}" class="tf-button btn-effect mr-10">
                    <span class="effect">Quay lại</span>
                </a>
                <button type="submit" class="tf-button btn-effect">
                    <span class="effect">Thêm mới</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection