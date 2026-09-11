<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    public function create(Request $request): View
    {
        return view('admin.auth.reset-password', ['request' => $request]); // Hiện form đổi mật khẩu
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::broker('admins')->reset( // Đổi mật khẩu Admin
            $request->only('email', 'password', 'password_confirmation', 'token'),

            function (Admin $user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password), // Mã hóa mật khẩu
                    'remember_token' => Str::random(60),
                ])->save(); // Lưu vào database

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('admin.login')->with('status', __($status)) // Đổi thành công → Login
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]); // Đổi thất bại → Hiện lỗi
    }
}
