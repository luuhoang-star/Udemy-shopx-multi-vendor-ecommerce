@extends('frontend.layouts.app')

@section('contents')
    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Sản phẩm']]" />
    <div class="container mt-70 mb-60">
        <div class="row">

            @include('frontend.pages.partials.product-page-sidebar')

            <div class="col-lg-9 col-xxl-10">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>Tìm thấy <strong class="text-brand">{{ $products->total() }}</strong> sản phẩm phù hợp!</p>
                    </div>
                    <div class="sort-by-product-area">
                    </div>
                </div>
                <div class="row product-grid">
                    @forelse($products as $product)
                        <x-frontend.product-card :product="$product" />
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">Không tìm thấy sản phẩm nào.</p>
                        </div>
                    @endforelse
                </div>
                <!--product grid-->
                <div class="pagination-area">
                  {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
@endpush
