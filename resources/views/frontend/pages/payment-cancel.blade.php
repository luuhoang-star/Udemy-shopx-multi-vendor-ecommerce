@extends('frontend.layouts.app')

@section('contents')

    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Thanh toán bị hủy']]" />
    <div class="container mb-60 mt-55">
        <div class="text-center mt-100 mb-100">
            <i class="fa-solid fa-circle-xmark fa-10x text-danger"></i>
            <h1 class="mt-20">Thanh toán đã bị hủy</h1>
            <p class="mt-10">Giao dịch của bạn đã bị hủy hoặc chưa hoàn tất. Vui lòng thử lại.</p>
            <a href="{{ route('cart.index') }}" class="btn btn-primary mt-20">Quay lại giỏ hàng</a>
        </div>
    </div>
@endsection
