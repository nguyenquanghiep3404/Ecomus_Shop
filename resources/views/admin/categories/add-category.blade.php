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

        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.category.addCategory') }}" method="POST">
        @csrf
        <div>
            <label for="name">Tên danh mục:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <button type="submit">Thêm danh mục</button>
    </form>
    </div>
</div>
@endsection