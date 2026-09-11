<?php

namespace App\Http\Requests\Admin; // Namespace xử lý Login Admin

use Illuminate\Auth\Events\Lockout; // Event khi bị khóa login
use Illuminate\Foundation\Http\FormRequest; // Form Request
use Illuminate\Support\Facades\Auth; // Xử lý đăng nhập
use Illuminate\Support\Facades\RateLimiter; // Giới hạn số lần login
use Illuminate\Support\Str; // Xử lý chuỗi
use Illuminate\Validation\ValidationException; // Lỗi validation

class LoginRequest extends FormRequest // Request xử lý login
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool // Kiểm tra quyền gửi request
    {
        return true; // Cho phép request
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array // Khai báo validation
    {
        return [
            'email' => ['required', 'string', 'email'], // Email bắt buộc + đúng định dạng
            'password' => ['required', 'string'], // Password bắt buộc
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     */
    public function authenticate(): void // Xử lý đăng nhập
    {
        $this->ensureIsNotRateLimited(); // Kiểm tra có bị giới hạn login không

        if (! Auth::guard('admin')->attempt( // Thử đăng nhập bằng guard admin
            $this->only('email', 'password'), // Lấy email + password
            $this->boolean('remember') // Ghi nhớ đăng nhập
        )) {
            RateLimiter::hit($this->throttleKey()); // Tăng số lần login sai

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'), // Báo sai email/password
            ]);
        }

        RateLimiter::clear($this->throttleKey()); // Xóa bộ đếm khi login đúng
    }

    /**
     * Ensure the login request is not rate limited.
     */
    public function ensureIsNotRateLimited(): void // Kiểm tra giới hạn login
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) { // Chưa vượt quá 5 lần
            return; // Cho phép tiếp tục
        }

        event(new Lockout($this)); // Phát event bị khóa

        $seconds = RateLimiter::availableIn($this->throttleKey()); // Lấy thời gian còn khóa

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [ // Báo đăng nhập quá nhiều
                'seconds' => $seconds, // Số giây còn lại
                'minutes' => ceil($seconds / 60), // Số phút còn lại
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string // Tạo key để đếm login
    {
        return Str::transliterate( // Chuyển ký tự đặc biệt về dạng phù hợp
            Str::lower($this->string('email')) . '|' . $this->ip() // email + IP
        );
    }
}