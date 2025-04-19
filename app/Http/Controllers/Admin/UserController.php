<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

// class UserController extends Controller
// {
//     public function listUsers(Request $request)
// {
//     $search = $request->input('search');
    
//     $users = User::when($search, function ($query) use ($search) {
//         return $query->where('name', 'like', "%$search%")
//                     ->orWhere('email', 'like', "%$search%");
//     })
//     ->paginate(10);

//     return view('admin.users.list-user', compact('users'));
// }

//     public function getAddUser(){
//         return view('admin.users.add-user');
//     }
//     public function addUser(Request $req){
//         $req->validate([
//             'name' => 'required',
//             'email' => ['required', 'email'],
//             'password' => 'required',
//             'role' => 'required',
//         ]);
//         $check = User::where('email', $req->email)->exists();

// if (!$check) {
//     $newUser = new User();
//     $newUser->name = $req->name;
//     $newUser->email = $req->email;
//     $newUser->password = Hash::make($req->password);
//     $newUser->role = $req->role;
//     $newUser->save();
// }else{
//     return redirect()->back()->with([
//         'message'=> 'email đã tồn tại'
//     ]);
// }

//         return redirect()->route('admin.users.listUsers')->with([
//             'message'=> 'Thêm mới thành công'
//         ]);
//     }

//     // Hiển thị form chỉnh sửa người dùng
//     public function updateUser($idUser)
//     {
//         $user = User::findOrFail($idUser);
//         return view('admin.users.update-user');
//     }

//     // Xử lý cập nhật người dùng
//     public function updatePostUser(Request $request, $idUser)
//     {
//         $user = User::findOrFail($idUser);

//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => [
//                 'required',
//                 'email',
//                 Rule::unique('users')->ignore($user->id),
//             ],
//             'password' => 'nullable|string|min:8',
//             'role' => 'required|in:1,2',
//         ]);

//         $data = [
//             'name' => $request->name,
//             'email' => $request->email,
//             'role' => $request->role,
//         ];

//         if ($request->filled('password')) {
//             $data['password'] = Hash::make($request->password);
//         }

//         $user->update($data);

//         return redirect()->route('admin.users.listUsers')->with('message', 'Cập nhật người dùng thành công');
//     }

//     // Xóa người dùng
//     public function deleteUser($idUser)
//     {
//         $user = User::findOrFail($idUser);
//         $user->delete();
        
//         return redirect()->route('admin.users.listUsers')->with('message', 'Xóa người dùng thành công');
//     }

// }

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.list-user', ['users' => $users]);
    }

    // Hiển thị form thêm người dùng mới
    public function getAddUser()
    {
        return view('admin.users.add-user');
    }

    // Xử lý thêm người dùng mới
    public function addUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('admin.users.listUsers')->with('success', 'Người dùng đã được thêm thành công');
    }

    // Hiển thị form cập nhật người dùng
    public function updateUser($idUser)
    {
        $user = User::findOrFail($idUser);
        return view('admin.users.update-user', ['user' => $user]);
    }

    // Xử lý cập nhật người dùng
    public function updatePostUser(Request $request, $idUser)
    {
        $user = User::findOrFail($idUser);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $idUser,
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('admin.users.listUsers')->with('success', 'Người dùng đã được cập nhật thành công');
    }

    // Xử lý xóa người dùng
    public function deleteUser($idUser)
    {
        $user = User::findOrFail($idUser);
        $user->delete();

        return redirect()->route('admin.users.listUsers')->with('success', 'Người dùng đã được xóa thành công');
    }
}
