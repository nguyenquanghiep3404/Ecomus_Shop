<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;



class AuthenController extends Controller
{
    public function dashbroad()
    {
        return view('admin.dashbroad');
    }
    public function login()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống'
        ]);
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ) {
            if(Auth::user()->role == "1"){
                return redirect()->route('admin.dashbroad')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            }else{
                return redirect()->route('users.home')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            }
            // ddden trnag chu  admin
        } else {
            return redirect()->back()->with([
                'messageError' => 'Email hoặc mật khẩu không đúng'
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'messageError' => 'Đăng xuất thành công'
        ]);
    }
    public function signup()
    {
        return view('sign-up');
    }
    public function postSignup(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'agree' => 'accepted'
        ], [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống'
        ]);
            $newUser = new User();
            $newUser->name = $req->name;
            $newUser->email = $req->email;
            $newUser->password = Hash::make($req->password);
            $newUser->role = 2;
            $newUser->save();

        return redirect()->route('login')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }
    // Đăng nhập với google
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Tìm hoặc tạo user
            $user = User::updateOrCreate([
                'email' => $googleUser->getEmail(),
            ], [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'email_verified_at' => now(),
                'password' => bcrypt('password') // hoặc random password nếu bạn muốn
            ]);
            Auth::login($user);
                if(Auth::user()->role == "1"){
                    return redirect()->route('admin.dashbroad','Đăng nhập thành công!');
                }else{
                    return redirect()->route('users.home','Đăng nhập thành công!');
                }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Đăng nhập Google thất bại!');
        }

    }
}
