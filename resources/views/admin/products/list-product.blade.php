@extends('admin.layouts.main')

@section('title')
    @parent
    Danh sách sản phẩm
@endsection

@push('style')
<style>
    /* General Enhancements */
    .main-content-wrap {
        padding: 25px; /* Add some padding */
    }

    .wg-box {
        background-color: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        overflow: hidden; /* Needed for responsive table */
    }

    /* Breadcrumbs */
    .breadcrumbs {
        padding-left: 0; /* Remove default list padding */
    }
    .breadcrumbs li {
        display: inline-flex; /* Align items vertically */
        align-items: center;
    }
    .breadcrumbs .text-tiny {
        font-size: 0.85rem;
        color: #6c757d; /* Use Bootstrap secondary color */
    }
    .breadcrumbs a:hover .text-tiny {
        color: #0d6efd; /* Bootstrap primary color */
    }
    .breadcrumbs i {
        font-size: 0.7rem;
        color: #adb5bd; /* Lighter gray */
        margin: 0 5px;
    }
    .breadcrumbs li:last-child .text-tiny {
        color: #212529; /* Bootstrap dark color for active page */
        font-weight: 500;
    }

    /* Search Form */
    .form-search {
        display: flex;
        border: 1px solid #dee2e6; /* Bootstrap input border color */
        border-radius: 0.375rem; /* Bootstrap default border-radius */
        overflow: hidden; /* Keep button inside */
        max-width: 400px; /* Limit search bar width */
    }
    .form-search input[type="text"] {
        border: none;
        flex-grow: 1;
        padding: 0.5rem 1rem; /* Adjust padding */
        font-size: 0.95rem;
        outline: none; /* Remove default outline */
    }
    .form-search .button-submit button {
        background-color: #0d6efd; /* Bootstrap primary */
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        cursor: pointer;
        transition: background-color 0.2s ease;
        height: 100%; /* Fill height */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .form-search .button-submit button:hover {
        background-color: #0b5ed7; /* Darker shade */
    }

    /* Add Product Button */
    .tf-button.style-1 {
        /* Assuming this is your custom button style - ensure it fits */
        padding: 0.6rem 1.2rem; /* Adjust padding */
        border-radius: 0.375rem;
        text-decoration: none; /* Remove underline */
        display: inline-flex; /* Align icon and text */
        align-items: center;
        gap: 5px; /* Space between icon and text */
        transition: all 0.2s ease;
    }
    .tf-button.style-1:hover {
        transform: translateY(-2px); /* Slight lift effect */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Table Enhancements */
    .table {
        margin-bottom: 1rem; /* Consistent spacing */
        border-color: #dee2e6; /* Standard border color */
    }
    .table thead th {
        background-color: #f8f9fa; /* Lighter header */
        border-bottom-width: 2px;
        font-weight: 600; /* Bolder headers */
        font-size: 0.9rem; /* Slightly smaller header font */
        text-transform: uppercase; /* Uppercase headers */
        letter-spacing: 0.5px;
        color: #495057; /* Header text color */
    }
    .table tbody tr {
        transition: background-color 0.15s ease-in-out; /* Smooth hover */
    }
    .table tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.04); /* Subtle hover effect */
    }
    .table td, .table th {
        vertical-align: middle; /* Ensure vertical alignment */
        padding: 0.9rem 0.75rem; /* Adjust cell padding */
    }

    /* Product Image Thumbnail */
    .img-thumbnail {
        padding: 0.2rem;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease; /* Add transition */
        background-color: #fff; /* White background for images */
    }
    .img-thumbnail:hover {
        transform: scale(1.1); /* Slightly enlarge on hover */
        box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Add shadow on hover */
        z-index: 10; /* Bring hovered image to front */
        position: relative; /* Needed for z-index */
    }

    /* Action Buttons */
    .action-buttons .btn {
        padding: 0.3rem 0.6rem; /* Smaller padding for icon buttons */
        font-size: 0.9rem; /* Adjust icon size if needed via font-size */
        margin: 0 2px; /* Small gap between buttons */
        transition: all 0.2s ease; /* Smooth transition */
    }
     .action-buttons .btn-warning:hover,
     .action-buttons .btn-danger:hover,
     .action-buttons .btn-info:hover {
        transform: scale(1.1); /* Scale effect */
        box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    }
     .action-buttons .btn-view-detail {
        color: #0dcaf0; /* Bootstrap info color */
        background: none;
        border: none;
        padding: 0.3rem 0.6rem;
        font-size: 1.1rem; /* Larger eye icon */
        transition: color 0.2s ease, transform 0.2s ease;
     }
     .action-buttons .btn-view-detail:hover {
        color: #08a9c9; /* Darker info */
        transform: scale(1.1);
     }
    .action-buttons form {
        display: inline-block; /* Keep delete form inline */
    }

    /* Pagination */
    .pagination {
        justify-content: center; /* Center pagination */
        margin-top: 20px;
    }

</style>
@endpush

@section('content')
    <div class="main-content-wrap">
        {{-- Breadcrumbs --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <h3 class="mb-0">Danh sách sản phẩm</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashbroad') }}"><i class="icon-home me-1"></i>Trang quản trị</a>
                    </li>
                    <li class="breadcrumb-item">
                         <a href="{{ route('admin.products.listProduct') }}">Quản lý sản phẩm</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
                </ol>
            </nav>
        </div>

        {{-- Filters and Actions --}}
        <div class="wg-box mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                {{-- Search Form --}}
                {{-- <div class="wg-filter flex-grow-1" style="max-width: 400px;">
                    <form class="form-search shadow-sm">
                        <fieldset class="name flex-grow-1">
                            <input type="text" placeholder="Tìm kiếm sản phẩm..." class="" name="name" tabindex="1"
                                value="{{ request('name') }}" aria-label="Tìm kiếm sản phẩm">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit" aria-label="Tìm kiếm"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div> --}}
                {{-- Add New Button --}}
                <a class="tf-button style-1 btn btn-primary" href="{{ route('admin.products.addProduct') }}">
                    <i class="icon-plus"></i>Thêm mới sản phẩm
                </a>
            </div>
        </div>

        {{-- Product List Table --}}
        <div class="wg-box">
            <div class="table-responsive">
                <table class="table table-hover align-middle" style="min-width: 1000px;">
                    <thead >
                        <tr>
                            <th class="text-center" style="width: 5%;">STT</th>
                            <th style="width: 25%;">Tên sản phẩm</th>
                            <th style="width: 15%;">Giá sản phẩm</th>
                            <th style="width: 15%;">Danh mục</th>
                            <th class="text-center" style="width: 25%;">Ảnh</th>
                            <th class="text-center" style="width: 15%;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($listProduct as $key => $value)
                        <tr>
                            <td class="text-center">{{ $listProduct->firstItem() + $key }}</td> {{-- Correct STT for pagination --}}
                            <td>
                                <a href="{{ route('admin.products.showProduct', $value->id) }}" class="text-dark fw-medium text-decoration-none">
                                    {{ $value->name }}
                                </a>
                            </td>
                            <td class="text-success fw-medium">{{ number_format($value->price, 0, ',', '.') }} VNĐ</td> {{-- Format price --}}
                            <td>{{ $value->category->name ?? 'N/A' }}</td> {{-- Handle potential missing category --}}
                            <td class="text-center">
                                <div class="d-flex flex-wrap gap-2 justify-content-center">
                                    @if($value->images->isNotEmpty())
                                        @foreach ($value->images as $image)
                                            <img src="{{ asset($image->image_url) }}"
                                                 class="img-thumbnail"
                                                 style="width: 50px; height: 50px; object-fit: cover;"
                                                 alt="{{ $value->name }} image"
                                                 loading="lazy"> {{-- Add lazy loading --}}
                                        @endforeach
                                    @else
                                         <span class="text-muted fst-italic">Không có ảnh</span>
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="action-buttons d-flex gap-2 justify-content-center">
                                     {{-- View Button --}}
                                    <a href="{{ route('admin.products.showProduct', $value->id) }}" class="btn-view-detail" title="Xem chi tiết">
                                        <i class="icon-eye"></i>
                                      </a>
                                    {{-- Edit Button --}}
                                    <a href="{{ route('admin.products.updateProduct', $value->id)}}" class="btn btn-sm btn-warning text-white" title="Chỉnh sửa">
                                        <i class="icon-edit-3"></i>
                                    </a>
                                    {{-- Delete Button (inside a form) --}}
                                    <form action="{{ route('admin.products.deleteProduct') }}" method="post" class="delete-form d-inline">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" value="{{ $value->id}}" name="idProduct">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <p>Không tìm thấy sản phẩm nào.</p>
                                @if(!request('name')) {{-- Show add button suggestion only if not searching --}}
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.products.addProduct') }}">
                                    <i class="icon-plus me-1"></i>Thêm sản phẩm mới
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($listProduct->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $listProduct->links('pagination::bootstrap-5')}}
            </div>
            @endif

        </div>
        {{-- / Product List Table --}}
    </div>
@endsection

@push('script')
{{-- Include SweetAlert2 library (using CDN) --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn sẽ không thể hoàn tác hành động này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33', // Red for delete confirmation
                cancelButtonColor: '#3085d6', // Blue for cancel
                confirmButtonText: 'Vâng, xóa nó!',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form programmatically
                    form.submit();
                }
            });
        });
    });
});
</script>
@endpush