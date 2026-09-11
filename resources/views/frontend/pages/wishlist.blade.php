@extends('frontend.layouts.app')

@php
    $currencyIcon = config('settings.site_currency_icon', '$');
@endphp

@section('contents')
    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Sản phẩm yêu thích']]" />

    <div class="container mb-60 mt-60">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-50">
                    <h1 class="heading-2 mb-10">Danh sách yêu thích của bạn</h1>
                    <h6 class="text-body">Có <span class="text-brand">{{ count($wishlistItems) }}</span> sản phẩm trong danh sách</h6>
                </div>
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist mb-0">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Tình trạng kho</th>
                                <th scope="col" class="end">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($wishlistItems as $item)
                            <tr class="pt-30">

                                <td class="image product-thumbnail pt-40"><img src="{{ asset($item->product?->primaryImage?->path) }}"
                                        alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="{{ route('products.show', $item->product->slug) }}">{{ $item->product?->name }}</a></h6>
                                    <div class="product-rate-cover">
                                        @php
                                            $rating = $item->product?->reviews_avg_rating ?? 5;
                                            $percent = ($rating / 5) * 100;
                                        @endphp
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: {{ $percent }}%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> ({{ round($rating, 1) }})</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Giá">
                                    @php
                                        $price = $item->product?->getEffectivePriceAndStock();
                                    @endphp
                                    <h3 class="text-brand">{{ $currencyIcon }} {{ $price['price'] }}</h3>
                                </td>
                                <td class="text-center detail-info" data-title="Kho hàng">
                                    @if($price['in_stock'])
                                    <span class="stock-status in-stock mb-0"> Còn hàng </span>
                                    @else
                                    <span class="stock-status in-stock mb-0 text-danger"> Hết hàng </span>
                                    @endif
                                </td>

                                <td class="action text-center" data-title="Xóa">
                                    <a href="{{ route('wishlist.destroy', $item->id) }}" class="text-body delete-item"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr class="pt-30">
                                <td colspan="5" class="text-center py-4">Chưa có sản phẩm nào trong danh sách yêu thích.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
