@extends('admin.layouts.main')

@section('title')
    @parent
    Danh sách người dùng
@endsection

@push('style')
@endpush

@section('content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-30">
            <h3>All User</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="#">
                        <div class="text-tiny">User</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">All User</div>
                </li>
            </ul>
        </div>
        <!-- all-user -->
        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value=""
                                aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.users.getAddUser')}}"><i class="icon-plus"></i>Add new</a>
            </div>
            <div class="wg-table table-all-user">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>role</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == 1)
                                        <span class="badge bg-primary">Admin</span>
                                    @else
                                        <span class="badge bg-secondary">User</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.updateUser', $user->id) }}">Sửa</a>
                                    <form action="{{ route('admin.users.deleteUser', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{-- <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</div>
                <ul class="wg-pagination">
                    @if ($users->onFirstPage())
                        <li class="disabled"><span><i class="icon-chevron-left"></i></span></li>
                    @else
                        <li><a href="{{ $users->previousPageUrl() }}"><i class="icon-chevron-left"></i></a></li>
                    @endif
            
                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        <li class="{{ $page == $users->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
            
                    @if ($users->hasMorePages())
                        <li><a href="{{ $users->nextPageUrl() }}"><i class="icon-chevron-right"></i></a></li>
                    @else
                        <li class="disabled"><span><i class="icon-chevron-right"></i></span></li>
                    @endif
                </ul>
            </div> --}}
        </div>
        <!-- /all-user -->
    </div>
@endsection

{{-- @push('script')
@if(session('message'))
<div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1050; width: 100%; max-width: 600px;">
    <div class="toast show bg-white border-danger" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="d-flex align-items-center p-4">
            <div class="toast-body fs-5 text-danger flex-grow-1"> <!-- Tăng kích thước chữ -->
                {{ session('message') }}
            </div>
            <button type="button" 
                    class="btn-close me-3" 
                    data-bs-dismiss="toast" 
                    aria-label="Close"
                    style="flex-shrink: 0;"></button> <!-- Đảm bảo nút luôn hiển thị -->
        </div>
    </div>
</div>

<!-- Thêm đoạn JavaScript khởi tạo toast -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastEl = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
</script>
@endif
@endpush --}}