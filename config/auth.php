<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // Guard mặc định
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'), // Reset password mặc định
    ],

    'guards' => [
        'web' => [
            'driver' => 'session', // Lưu login bằng session
            'provider' => 'users', // Dùng provider users
        ],

        'admin' => [
            'driver' => 'session', // Lưu login bằng session
            'provider' => 'admins', // Dùng provider admins
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent', // Lấy tài khoản bằng Eloquent
            'model' => env('AUTH_MODEL', App\Models\User::class), // Model User
        ],

        'admins' => [
            'driver' => 'eloquent', // Lấy tài khoản bằng Eloquent
            'model' => env('AUTH_MODEL', App\Models\Admin::class), // Model Admin
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users', // Provider của User
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'), // Bảng lưu token
            'expire' => 60, // Token hết hạn sau 60 phút
            'throttle' => 60, // Chờ 60 giây mới gửi lại
        ],

        'admins' => [
            'provider' => 'admins', // Provider của Admin
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'), // Bảng lưu token
            'expire' => 60, // Token hết hạn sau 60 phút
            'throttle' => 60, // Chờ 60 giây mới gửi lại
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800), // Xác nhận password lại sau 3 giờ
];
