@extends('admin.layouts.main')

@section('title')
    @parent
    Chỉnh sửa người dùng
@endsection

@push('style')
@endpush

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-30">
        <h3>Chỉnh sửa người dùng</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li>
                <a href="index.html"><div class="text-tiny">Dashboard</div></a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <a href="#"><div class="text-tiny">User</div></a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">Chỉnh sửa người dùng</div>
            </li>
        </ul>
    </div>
    @if (session('success'))
        <div style="color: green;">
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

    <form action="{{ route('admin.users.updatePostUser', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label for="role">Vai trò:</label>
            <input type="text" name="role" id="role" value="{{ old('role', $user->role) }}" required>
        </div>
        <div>
            <label for="password">Mật khẩu (để trống nếu không thay đổi):</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Cập nhật người dùng</button>
    </form>
    <!-- /edit-user -->
</div>
@endsection

@push('script')
@if(session('message'))
<div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1050; width: 100%; max-width: 600px;">
    <div class="toast show bg-white border-danger" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="d-flex align-items-center p-4">
            <div class="toast-body fs-5 text-danger flex-grow-1">
                {{ session('message') }}
            </div>
            <button type="button" 
                    class="btn-close me-3" 
                    data-bs-dismiss="toast" 
                    aria-label="Close"
                    style="flex-shrink: 0;"></button>
        </div>
    </div>
</div>
@endif
@endpush