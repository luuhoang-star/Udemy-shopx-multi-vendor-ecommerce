@extends('frontend.dashboard.dashboard-app')

@section('dashboard_contents')
<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="card">
        <div class="card-header p-0 pb-10">
            <h3 class="mb-0">Xin chào {{ user()->name }}!</h3>
        </div>
        <div class="card-body p-0">
            <p>
                Từ bảng điều khiển tài khoản, bạn có thể dễ dàng kiểm tra &amp; theo dõi <a href="{{ route('orders.index') }}">đơn hàng gần đây</a>,<br />
                quản lý <a href="{{ route('address.index') }}">sổ địa chỉ giao nhận</a> và <a href="{{ route('profile') }}">cập nhật thông tin tài khoản &amp; đổi mật khẩu.</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <div class="dashboard_card blue">
                <span><i class="fa-solid fa-cart-shopping"></i></span>
                <h3>{{ $totalOrders }}</h3>
                <p>Tổng đơn hàng</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="dashboard_card red">
                <span><i class="fa-solid fa-xmark"></i></span>
                <h3>{{ $totalCanceledOrders }}</h3>
                <p>Đơn hàng đã hủy</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="dashboard_card orange">
                <span><i class="fa-solid fa-spinner"></i></span>
                <h3>{{ $totalPendingOrders }}</h3>
                <p>Đơn hàng chờ xử lý</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="dashboard_card green">
                <span><i class="fa-solid fa-star"></i></span>
                <h3>{{ $totalReviews }}</h3>
                <p>Đánh giá đã gửi</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="dashboard_card pink">
                <span><i class="fa-solid fa-location-dot"></i></span>
                <h3>{{ $totalAddresses }}</h3>
                <p>Địa chỉ đã lưu</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="dashboard_card purple">
                <span><i class="fi-rs-shopping-bag"></i></span>
                <h3>{{ $totalWishlists }}</h3>
                <p>Sản phẩm yêu thích</p>
            </div>
        </div>
    </div>
</div>

@endsection
