<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Facade Auth thường không cần trực tiếp trong login kiểu này
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Đảm bảo model User được import
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    /**
     * Xử lý yêu cầu đăng nhập và trả về token nếu thành công.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // 1. Validate dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'sometimes|string|max:255' // Thêm 'sometimes' để không bắt buộc
        ]);

        // 2. Tìm người dùng bằng email
        $user = User::where('email', $request->email)->first();

        // 3. Kiểm tra người dùng tồn tại và mật khẩu khớp
        if (!$user || !Hash::check($request->password, $user->password)) {
            // Ném lỗi Validation để trả về response 422 chuẩn của Laravel
            throw ValidationException::withMessages([
                // Sử dụng key 'message' hoặc 'email' tùy theo cách bạn muốn hiển thị lỗi ở client
                'message' => [trans('auth.failed')], // Lấy thông báo lỗi chuẩn
                //'email' => [trans('auth.failed')],
            ]);
        }

        // 4. Tạo token mới cho người dùng
        // Sử dụng device_name từ request nếu có, nếu không thì tạo tên mặc định
        // Việc tạo tên token rõ ràng giúp quản lý token dễ hơn (ví dụ: 'mobile_app_token', 'web_token')
        $tokenName = $request->input('device_name', 'auth_token_' . $user->id . '_' . now()->timestamp);
        $token = $user->createToken($tokenName);

        // --- Tùy chọn: Xóa các token cũ ---
        // Nếu bạn muốn mỗi user chỉ có 1 token active tại một thời điểm cho một loại thiết bị:
        // $user->tokens()->where('name', $tokenName)->where('id', '!=', $token->accessToken->id)->delete();
        // Hoặc nếu muốn xóa tất cả token cũ bất kể tên:
        // $user->tokens()->where('id', '!=', $token->accessToken->id)->delete();
        // --- Kết thúc tùy chọn xóa token cũ ---


        // 6. Trả về response thành công kèm token
        return response()->json([
            'message' => 'Đăng nhập thành công',
            // Cân nhắc sử dụng API Resource (ví dụ: UserResource) để kiểm soát dữ liệu user trả về
            'user' => $user,
            'access_token' => $token->plainTextToken, // Token dạng chuỗi để client sử dụng
            'token_type' => 'Bearer',
        ], 200);
    }

    /**
     * Xử lý yêu cầu đăng xuất (xóa token hiện tại).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Lấy user đang được xác thực thông qua token của request
        $user = $request->user();

        // Xóa token đang được sử dụng để thực hiện request này
        $user->currentAccessToken()->delete();

        return response()->json(['message' => 'Đã đăng xuất thành công'], 200);
    }
}
