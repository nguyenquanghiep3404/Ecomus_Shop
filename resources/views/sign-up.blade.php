@extends('admin.layouts.authen')

@section('title')
    @parent
    Đăng nhập
@endsection

@push('style')
@endpush

@section('content')
    <div id="page" class="">
        <div class="login-page">
            <div class="left">
                <div class="login-box type-signup">
                    <div>
                        <h3>Tạo mới tài khoản</h3>
                        <div class="body-text text-white">Or enter your personal details to create account</div>
                    </div>
                    <div class="flex flex-column gap16 w-full">
                        <a href="index.html" class="tf-button style-4 w-full">
                            <span class="">Ecomus Admin Dashboard</span>
                        </a>
                        <a href="https://themesflat.co/html/ecomus/index.html" class="tf-button style-2 w-full">
                            <span class="">Sign in to continue to Ecomus.</span>
                        </a>
                    </div>
                    <form class="form-login flex flex-column gap22 w-full" action="{{ route('postSignup') }}" method="post">
                        @csrf
                        
                        <!-- Hiển thị thông báo lỗi -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        <div>
                            <fieldset class="name">
                                <div class="body-title mb-10 text-white">Họ và tên <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Nhập họ và tên" name="name" 
                                       value="{{ old('name') }}" >
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                    
                        <fieldset class="email">
                            <div class="body-title mb-10 text-white">Email <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="email" placeholder="Nhập email" name="email" 
                                   value="{{ old('email') }}" >
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </fieldset>
                    
                        <fieldset class="password">
                            <div class="body-title mb-10 text-white">Mật khẩu <span class="tf-color-1">*</span></div>
                            <input class="password-input" type="password" placeholder="Nhập mật khẩu" 
                                   name="password" >
                            
                            <span class="show-pass">
                                <i class="icon-eye view"></i>
                                <i class="icon-eye-off hide"></i>
                            </span>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </fieldset>
                    
                        <fieldset class="password">
                            <div class="body-title mb-10 text-white">Xác nhận mật khẩu <span class="tf-color-1">*</span></div>
                            <input class="password-input" type="password" placeholder="Nhập lại mật khẩu" 
                                   name="password_confirmation" > <!-- Đã sửa tên trường -->
                            <span class="show-pass">
                                <i class="icon-eye view"></i>
                                <i class="icon-eye-off hide"></i>
                            </span>
                           
                        </fieldset>
                    
                        <div class="flex justify-between items-center">
                            <div class="flex gap10">
                                <input class="tf-check" type="checkbox" id="agree" name="agree" >
                                <label class="body-text text-white" for="agree">Tôi đồng ý với điều khoản</label>
                            </div>
                        </div>
                        @error('agree')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    
                        <button type="submit" class="tf-button w-full">Đăng ký</button>
                    </form>
                    <div class="bottom body-text text-center text-center text-white w-full">
                        Already have account?
                        <a href="login.html" class="body-text tf-color">Sign in here</a>
                    </div>
                </div>
            </div>
            <div class="right">
                <img src="{{ asset('build/assets/images/images-section/Sign%20up.jpg')}}" alt="">
            </div>
        </div>
    </div>
@endsection

@push('script')
    @if (session('messageError'))
        <div class="position-fixed top-0 start-50 translate-middle-x p-3"
            style="z-index: 1050; width: 100%; max-width: 600px;">
            <div class="toast show bg-white border-danger" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-autohide="false">
                <div class="d-flex align-items-center p-4">
                    <div class="toast-body fs-5 text-danger flex-grow-1"> <!-- Tăng kích thước chữ -->
                        {{ session('messageError') }}
                    </div>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="toast" aria-label="Close"
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
@endpush
