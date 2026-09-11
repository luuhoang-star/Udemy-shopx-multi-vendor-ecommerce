<?php

namespace App\Http\Controllers\Admin\Auth; // Namespace của Admin Auth

use App\Http\Controllers\Controller; // Controller cơ sở
use App\Http\Requests\Admin\LoginRequest; // Request xử lý login
use Illuminate\Http\RedirectResponse; // Kiểu trả về redirect
use Illuminate\Http\Request; // HTTP Request
use Illuminate\Support\Facades\Auth; // Xử lý authentication
use Illuminate\View\View; // Kiểu trả về View

class AuthenticatedSessionController extends Controller // Controller đăng nhập Admin
{
    /**
     * Display the login view.
     */
    public function create(): View // Hiển thị trang login
    {
        return view('admin.auth.login'); // Trả về form login
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse // Xử lý đăng nhập
    {
        $request->authenticate(); // Kiểm tra email/password
        $request->session()->regenerate(); // Tạo session mới

        return redirect()->intended( // Chuyển hướng sau khi login
            route('admin.dashboard', absolute: false) // Mặc định về Admin Dashboard
        );
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse // Xử lý đăng xuất
    {
        Auth::guard('admin')->logout(); // Logout bằng guard admin
        $request->session()->invalidate(); // Hủy session
        $request->session()->regenerateToken(); // Tạo CSRF token mới

        return redirect('/'); // Chuyển về trang chủ
    }
}
