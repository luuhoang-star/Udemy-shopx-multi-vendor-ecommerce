@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                <div class="col-12 col-md-3 border-end">
                    <div class="card-body">
                        <h4 class="subheader">Cài đặt cổng thanh toán</h4>
                        <div class="list-group list-group-transparent">

                            <a href="{{ route('admin.payment-settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('admin.payment-settings.index') ? 'active' : '' }}">Cổng thanh toán PayPal</a>
                            <a href="{{ route('admin.stripe-settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('admin.stripe-settings.index') ? 'active' : '' }} ">Cổng thanh toán Stripe</a>
                            <a href="{{ route('admin.razorpay-settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('admin.razorpay-settings.index') ? 'active' : '' }}">Cổng thanh toán Razorpay</a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-9 d-flex flex-column">
                    @yield('settings_contents')
                </div>
            </div>
        </div>
    </div>
@endsection
