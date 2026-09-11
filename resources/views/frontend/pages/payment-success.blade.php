@extends('frontend.layouts.app')

@section('contents')

    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Thanh toán thành công']]" />
    <div class="container mb-60 mt-55">
        <div class="text-center mt-100 mb-100">
            <i class="fa-solid fa-circle-check fa-10x text-success"></i>
            <h1 class="mt-20">Thanh toán thành công!</h1>
            <p class="mt-10">Đơn hàng và thanh toán của bạn đã được tiếp nhận thành công.</p>
            <a href="{{ route('dashboard') }}" class="btn btn-success mt-20">Về trang quản lý tài khoản</a>
        </div>
    </div>
@endsection
