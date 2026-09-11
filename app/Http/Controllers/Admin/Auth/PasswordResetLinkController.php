<?php

namespace App\Http\Controllers\Admin\Auth; // Vị trí file

use App\Http\Controllers\Controller; // Controller
use Illuminate\Auth\Notifications\ResetPassword; // Gửi link đổi mật khẩu
use Illuminate\Http\RedirectResponse; // Chuyển trang
use Illuminate\Http\Request; // Dữ liệu gửi lên
use Illuminate\Support\Facades\Password; // Xử lý quên mật khẩu
use Illuminate\View\View; // Hiển thị giao diện

class PasswordResetLinkController extends Controller // Xử lý quên mật khẩu Admin
{
    public function create(): View // Hiện form quên mật khẩu
    {
        return view('admin.auth.forgot-password'); // Mở trang quên mật khẩu
    }

    public function store(Request $request): RedirectResponse // Xử lý gửi email
    {
        $request->validate([ // Kiểm tra dữ liệu
            'email' => ['required', 'email'], // Email bắt buộc
        ]);

        $status = Password::broker('admins')->sendResetLink( // Gửi link đổi mật khẩu
            $request->only('email'), // Lấy email

            function ($user, $token) { // Nhận tài khoản và mã
                $notification = new ResetPassword($token); // Tạo link đổi mật khẩu

                $notification->createUrlUsing(function () use ($user, $token) {
                    return route( // Tạo đường dẫn
                        'admin.password.reset', // Route đổi mật khẩu
                        ['token' => $token, 'email' => $user->email] // Gửi mã + email
                    );
                });

                $user->notify($notification); // Gửi email
            }
        );

        return $status == Password::RESET_LINK_SENT // Kiểm tra gửi thành công
            ? back()->with('status', __($status)) // Thành công → báo kết quả
            : back()->withInput($request->only('email')) // Thất bại → giữ email
            ->withErrors(['email' => __($status)]); // Hiện lỗi
    }
}