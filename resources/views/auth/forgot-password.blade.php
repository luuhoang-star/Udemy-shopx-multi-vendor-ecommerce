@extends('frontend.layouts.app')

@section('contents')
    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Quên mật khẩu']]" />

    <div class="page-content pt-150 pb-135">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 offset-lg-3">
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-5">Quên mật khẩu?</h3>
                                        <p class="mb-30">
                                            Vui lòng nhập địa chỉ email đã đăng ký tài khoản. Chúng tôi sẽ gửi liên kết đặt lại mật khẩu mới qua email cho bạn.
                                        </p>
                                    </div>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" required="" name="email" placeholder="Địa chỉ Email của bạn *"
                                                value="{{ old('email') }}" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up"
                                                name="login">Gửi liên kết đặt lại mật khẩu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
