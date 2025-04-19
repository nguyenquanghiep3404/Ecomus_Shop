@extends('admin.layouts.main')

@section('title')
    @parent
    Thêm mới người dùng
@endsection

@push('style')
@endpush

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-30">
        <h3>Add New User</h3>
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
                <div class="text-tiny">Thêm mới người dùng</div>
            </li>
        </ul>
    </div>
    <!-- add-new-user -->
    <form class="form-add-new-user form-style-2" action="{{route('admin.users.addUser')}}" method="post">
        @csrf
        <div class="wg-box">
            <div class="left">
                <h5 class="mb-4">Account</h5>
                <div class="body-text">Fill in the information below to add a new account</div>
            </div>
            <div class="right flex-grow">
                <fieldset class="name mb-24">
                    <div class="body-title mb-10">Tên </div>
                    <input class="flex-grow" type="text" placeholder="Username" name="name" tabindex="0" value="" aria-required="true" >
                </fieldset>
                <fieldset class="email mb-24">
                    <div class="body-title mb-10">Email</div>
                    <input class="flex-grow" type="email" placeholder="Email" name="email" tabindex="0" value="" aria-required="true" >
                </fieldset>
                <fieldset class="password mb-24">
                    <div class="body-title mb-10">Password</div>
                    <input class="password-input" type="password" placeholder="Enter password" name="password" tabindex="0" value="" aria-required="true" >
                    <span class="show-pass">
                        <i class="icon-eye view"></i>
                        <i class="icon-eye-off hide"></i>
                    </span>

                </fieldset>
                <fieldset class="password mb-24">
                    <div class="body-title mb-10">Role</div>
                    <!-- Sửa lại thẻ select -->
                    <select class="form-control" id="role" name="role">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </fieldset>
            </div>
        </div>
        {{-- <div class="wg-box">
            <div class="left">
                <h5 class="mb-4">Pernission</h5>
                <div class="body-text">Items that the account is allowed to edit</div>
            </div>
            <div class="right flex-grow">
                <fieldset class="mb-24">
                    <div class="body-title mb-10">Add product</div>
                    <div class="radio-buttons">
                        <div class="item">
                            <input class="" type="radio" name="add-product" id="add-product1" checked>
                            <label class="" for="add-product1"><span class="body-title-2">Allow</span></label>
                        </div>
                        <div class="item">
                            <input class="" type="radio" name="add-product" id="add-product2">
                            <label class="" for="add-product2"><span class="body-title-2">Deny</span></label>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mb-24">
                    <div class="body-title mb-10">Update product</div>
                    <div class="radio-buttons">
                        <div class="item">
                            <input class="" type="radio" name="update-product" id="update-product1">
                            <label class="" for="update-product1"><span class="body-title-2">Allow</span></label>
                        </div>
                        <div class="item">
                            <input class="" type="radio" name="update-product" id="update-product2" checked>
                            <label class="" for="update-product2"><span class="body-title-2">Deny</span></label>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mb-24">
                    <div class="body-title mb-10">Delete product</div>
                    <div class="radio-buttons">
                        <div class="item">
                            <input class="" type="radio" name="delete-product" id="delete-product1" checked>
                            <label class="" for="delete-product1"><span class="body-title-2">Allow</span></label>
                        </div>
                        <div class="item">
                            <input class="" type="radio" name="delete-product" id="delete-product2">
                            <label class="" for="delete-product2"><span class="body-title-2">Deny</span></label>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mb-24">
                    <div class="body-title mb-10">Apply discount</div>
                    <div class="radio-buttons">
                        <div class="item">
                            <input class="" type="radio" name="apply-product" id="apply-product1">
                            <label class="" for="apply-product1"><span class="body-title-2">Allow</span></label>
                        </div>
                        <div class="item">
                            <input class="" type="radio" name="apply-product" id="apply-product2" checked>
                            <label class="" for="apply-product2"><span class="body-title-2">Deny</span></label>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="">
                    <div class="body-title mb-10">Create coupon</div>
                    <div class="radio-buttons">
                        <div class="item">
                            <input class="" type="radio" name="create-product" id="create-product1">
                            <label class="" for="create-product1"><span class="body-title-2">Allow</span></label>
                        </div>
                        <div class="item">
                            <input class="" type="radio" name="create-product" id="create-product2" checked>
                            <label class="" for="create-product2"><span class="body-title-2">Deny</span></label>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div> --}}
        <div class="bot">
            <button class="tf-button w180" type="submit">Save</button>
        </div>
    </form>
    <!-- /add-new-user -->
</div>
@endsection

@push('script')
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
    
</script>
@endif
@endpush