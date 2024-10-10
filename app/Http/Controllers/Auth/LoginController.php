<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Xử lý đăng nhập
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ], [
    //         'email.required' => 'Bạn chưa nhập email',
    //         'password.required' => 'Bạn chưa nhập mật khẩu',
    //         'email.email' => 'Email sai định dạng',
    //     ]);

    //     // Kiểm tra thông tin đăng nhập
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return redirect()->intended('/');
    //     }
    //     return back()->withErrors([
    //         'email' => 'Thông tin đăng nhập không chính xác.',
    //     ]);
    // }

    public function login(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'Bạn chưa nhập email',
        'password.required' => 'Bạn chưa nhập mật khẩu',
        'email.email' => 'Email sai định dạng',
    ]);

    // Kiểm tra thông tin đăng nhập
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();

        // Kiểm tra trạng thái tài khoản
        if ($user->trang_thai === 'khoa') {
            // Đăng xuất và trả về thông báo lỗi
            Auth::logout();
            return back()->withErrors([
                'email' => 'Tài khoản của bạn đã bị khóa.',
            ]);
        }

        // Nếu tài khoản hoạt động, chuyển hướng đến trang intended
        return redirect()->intended('/');
    }

    // Trả về lỗi nếu thông tin đăng nhập không chính xác
    return back()->withErrors([
        'email' => 'Thông tin đăng nhập không chính xác.',
    ]);
}


    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
