<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Lấy danh sách tất cả người dùng
    public function listUsers(Request $request)
    {
        $search = $request->query('search');

        $users = User::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%");
        })->paginate(10);

        return response()->json($users);
    }

    // Thêm người dùng mới
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role'     => 'nullable|in:1,2', // optional, if role used
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role ?? 2, // default role
        ]);

        return response()->json([
            'message' => 'Người dùng đã được thêm thành công',
            'user' => $user
        ], 201);
    }

    // Lấy thông tin người dùng theo ID
    public function getUser($idUser)
    {
        $user = User::find($idUser);

        if (!$user) {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }

        return response()->json($user);
    }

    // Cập nhật người dùng
    public function updateUser(Request $request, $idUser)
    {
        $user = User::find($idUser);

        if (!$user) {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8',
            'role'     => 'nullable|in:1,2',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->name  = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->filled('role')) {
            $user->role = $request->role;
        }
        $user->save();

        return response()->json([
            'message' => 'Người dùng đã được cập nhật thành công',
            'user' => $user
        ]);
    }

    // Xoá người dùng
    public function deleteUser($idUser)
    {
        $user = User::find($idUser);

        if (!$user) {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Người dùng đã được xoá thành công']);
    }
}