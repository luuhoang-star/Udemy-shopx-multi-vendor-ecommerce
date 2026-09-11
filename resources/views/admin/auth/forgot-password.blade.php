<!doctype html>

<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Quên mật khẩu</title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('assets/admin/dist/css/tabler.css') }}" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN CUSTOM FONT -->
    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
    <!-- END CUSTOM FONT -->
</head>

<body>
    <!-- BEGIN GLOBAL THEME SCRIPT -->
    <script src="./dist/js/tabler-theme.min.js?1750026890"></script>
    <!-- END GLOBAL THEME SCRIPT -->
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="javascript:;" aria-label="ShopX" class="navbar-brand navbar-brand-autodark"><img
                        src="{{ asset(config('settings.site_logo')) }}" alt="">
                </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <p class="text-secondary mb-4">
                        Quên mật khẩu? Đừng lo lắng. Hãy nhập địa chỉ email của bạn và chúng tôi sẽ gửi liên kết đặt lại
                        mật khẩu để bạn tạo mật khẩu mới.
                    </p>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form action="{{ route('admin.password.email') }}" method="POST" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ Email</label>
                            <input type="email" name="email" :value="old('email')" class="form-control"
                                placeholder="your@email.com" autocomplete="off" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Gửi liên kết đặt lại mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
