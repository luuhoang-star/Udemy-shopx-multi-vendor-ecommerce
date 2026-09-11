@extends('frontend.layouts.app')

@section('contents')
    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Danh sách người bán']]" />

<div class="page-content pt-70">
            <div class="container">
                <div class="row mb-10">
                    <div class="col-12">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p>Hiện có <strong class="text-brand">{{ count($vendors) }}</strong> đối tác người bán uy tín</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row vendor-grid">
                    @foreach($vendors as $vendor)
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                        <div class="vendor-wrap mb-40">
                            <div class="vendor-img-action-wrap">
                                <div class="vendor-img">
                                    <a href="{{ route('vendors.show', $vendor->id) }}">
                                        <img class="default-img" src="{{ asset($vendor?->store?->logo) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="vendor-content-wrap">
                                <div class="d-flex justify-content-between align-items-end mb-30">
                                    <div>
                                        <div class="product-category">
                                            <span class="text-muted">Tham gia từ {{ date('Y', strtotime($vendor?->store?->created_at)) }}</span>
                                        </div>
                                        <h4 class="mb-5"><a href="{{ route('vendors.show', $vendor->id) }}">{{ $vendor?->store?->name }}</a></h4>
                                        <div class="product-rate-cover">
                                            @php
                                                $ratingPercent = $vendor->store?->reviews_avg_rating ? ($vendor->store?->reviews_avg_rating / 5) * 100 : 0;
                                            @endphp
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: {{ $ratingPercent }}%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{ round($vendor?->store?->reviews_avg_rating, 2) }})</span>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <span class="font-small total-product">{{ $vendor->products_count }} sản phẩm</span>
                                    </div>
                                </div>
                                <div class="vendor-info mb-30">
                                    <ul class="contact-infor text-muted">
                                        <li><img src="{{ asset('assets/frontend/dist/imgs/theme/icons/icon-location.svg') }}" alt=""><strong>Địa chỉ: </strong> <span>{{ $vendor?->store?->address }}</span></li>
                                        <li><img src="{{ asset('assets/frontend/dist/imgs/theme/icons/icon-contact.svg') }}" alt=""><strong>Hotline:</strong><span> {{ $vendor?->store?->phone }}</span></li>
                                    </ul>
                                </div>
                                <a href="{{ route('vendors.show', $vendor->id) }}" class="btn btn-xs">Ghé thăm gian hàng <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="pagination-area">
                    {{ $vendors->links() }}
                </div>
            </div>
        </div>
@endsection
