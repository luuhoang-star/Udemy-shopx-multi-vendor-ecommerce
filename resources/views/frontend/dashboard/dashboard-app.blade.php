@extends('frontend.layouts.app')

@section('contents')
    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Bảng điều khiển']]" />
    <div class="page-content pt-70 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-3 d-print-none">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive(['dashboard']) }}"
                                            href="{{ route('dashboard') }}"><i
                                                class="fi-rs-settings-sliders mr-10"></i>Bảng điều khiển</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive(['orders.*']) }}"
                                            href="{{ route('orders.index') }}"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Đơn hàng của tôi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive(['purchased.*']) }}"
                                            href="{{ route('purchased.products') }}"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Sản phẩm số đã mua</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive(['track.order.*']) }}"
                                            href="{{ route('track.order.index') }}"><i
                                                class="fi-rs-shopping-cart-check mr-10"></i>Tra cứu đơn hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive(['reviews.*']) }}"
                                            href="{{ route('reviews.index') }}">
                                            <i class="fi fi-rs-star mr-10"></i> Đánh giá của tôi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive(['wishlist.index']) }}" href="{{ route('wishlist.index') }}">
                                            <i class="fi fi-rs-heart mr-10"></i> Sản phẩm yêu thích
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive(['address.*']) }}"
                                            href="{{ route('address.index') }}"><i class="fi-rs-marker mr-10"></i>Sổ địa chỉ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive(['profile']) }}" href="{{ route('profile') }}"><i
                                                class="fi-rs-user mr-10"></i>Thông tin tài khoản</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" onclick="event.preventDefault(); $('.form-logout').submit()"
                                            href="#"><i class="fi-rs-sign-out mr-10"></i>Đăng xuất</a>
                                    </li>
                                    <form class="form-logout" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                @yield('dashboard_contents')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
