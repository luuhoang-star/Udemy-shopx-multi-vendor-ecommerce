@extends('frontend.layouts.app')

@php
    $currencyIcon = config('settings.site_currency_icon', '$');
@endphp

@section('contents')
    @php
        $cartSubTotal = 0;
    @endphp

    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Giỏ hàng']]" />
    <div class="container mb-60 mt-55">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Giỏ hàng của bạn</h1>
                <div class="d-flex flex-wrap justify-content-between">
                    <h6 class="text-body">Có <span class="text-brand">{{ cartCount() }}</span> sản phẩm trong giỏ hàng
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th colspan="2">Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng phụ</th>
                                <th class="end">Xóa</th>
                            </tr>
                        </thead>
                        <tbody class="cart-items">
                            @forelse($cartItems as $cartItem)
                                <tr class="">
                                    <td class="image product-thumbnail"><img
                                            src="{{ asset($cartItem->product?->primaryImage?->path) }}" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                href="{{ route('products.show', $cartItem->product?->slug ?? '') }}">{{ $cartItem->product?->name }}</a></h6>
                                        <div class="product-rate-cover">
                                            <span>{{ $cartItem->product?->variants()->where('id', $cartItem->variant_id)->first()->name ?? '' }}</span>
                                        </div>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: {{ ratingPercent($cartItem->product?->reviews_avg_rating ?? 5) }}%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{ round($cartItem->product?->reviews_avg_rating, 1) ?? '5.0' }})</span>
                                        </div>
                                    </td>
                                    @php
                                        $price = $cartItem->product->getVariantOrProductPriceAndStock(
                                            $cartItem->variant_id,
                                        );
                                        $cartSubTotal += $price['price'] * $cartItem->quantity;
                                    @endphp
                                    @if ($price['in_stock'])
                                        <td class="price" data-title="Giá">

                                            @if ($price['old_price'])
                                                <h4 class="text-body">{{ $currencyIcon }} {{ $price['price'] }}</h4>
                                                <h4 class="text-danger"
                                                    style="font-size: 18px;text-decoration: line-through;">{{ $currencyIcon }}
                                                    {{ $price['old_price'] }}</h4>
                                            @else
                                                <h4 class="text-body">{{ $currencyIcon }} {{ $price['price'] }}</h4>
                                            @endif

                                        </td>
                                        <td class="text-center detail-info" data-title="Số lượng">
                                            <div class="detail-extralink mr-15">
                                                <div class="detail-qty border radius">
                                                    <a href="#" class="qty-down"><i
                                                            class="fi-rs-angle-small-down"></i></a>
                                                    <input type="text" data-cart-item="{{ $cartItem->id }}"
                                                        name="quantity" class="qty-val" value="{{ $cartItem->quantity }}"
                                                        min="1" readonly>
                                                    <a href="#" class="qty-up"><i
                                                            class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price" data-title="Tổng tiền">
                                            <h4 class="text-brand">{{ $currencyIcon }} {{ $price['price'] * $cartItem->quantity }} </h4>
                                        </td>
                                    @else
                                        <td colspan="3">
                                            <h4 class="text-brand">Hết hàng</h4>
                                        </td>
                                    @endif
                                    <td class="action text-center" data-title="Xóa"><a
                                            href="{{ route('cart.destroy', $cartItem->id) }}"
                                            class="text-body delete-item"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                            @empty
                                <tr class="pt-30">
                                    <td colspan="6" class="text-center py-4">Giỏ hàng của bạn đang trống</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a class="btn" href="{{ route('products.index') }}"><i class="fi-rs-arrow-left mr-10"></i>Tiếp tục mua hàng</a>
                </div>

            </div>
            <div class="col-xl-4">
                @if(cartCount() > 0)
                <div class="p-40">
                    <h4 class="mb-10">Mã giảm giá</h4>
                    <p class="mb-30"><span class="font-lg text-muted">Bạn có mã ưu đãi?</p>
                    <form action="#" class="coupon-form">
                        @csrf
                        <div class="d-flex justify-content-between">
                            <input class="font-medium mr-15 coupon" name="coupon_code" placeholder="Nhập mã giảm giá..."
                                value="{{ session()->has('coupon') ? session('coupon')['code'] : old('coupon_code') }}">
                            @if (session()->has('coupon'))
                                <button class="btn bg-danger remove-coupon" type="button"><i
                                        class="fi-rs-cross mr-10"></i>Hủy bỏ</button>
                            @else
                                <button class="btn coupon-btn" type="submit"><i
                                        class="fi-rs-label mr-10"></i>Áp dụng</button>
                            @endif
                        </div>
                    </form>
                </div>
                @endif
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Tạm tính</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">{{ $currencyIcon }} <span
                                                class="cart_sub_total">{{ $cartSubTotal }}</span></h4>
                                    </td>
                                </tr>

                                @if (session()->has('coupon'))
                                    @php
                                        $discount =
                                            session('coupon')['coupon_type'] != 'fixed'
                                                ? $cartSubTotal * (session('coupon')['coupon_value'] / 100)
                                                : session('coupon')['coupon_value'];
                                    @endphp
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Giảm giá <span class="coupon-info">
                                                    @if (session('coupon')['coupon_type'] == 'fixed')
                                                        (Cố định)
                                                    @else
                                                        ({{ session('coupon')['coupon_value'] }}%)
                                                    @endif
                                                </span>
                                            </h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end discount">{{ $currencyIcon }}
                                                {{ $discount }}
                                            </h5>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Tổng thanh toán</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{ $currencyIcon }} <span
                                                    class="total">{{ max(0, $cartSubTotal - $discount) }}</span></h4>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Giảm giá <span class="coupon-info"></span></h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end discount">{{ $currencyIcon }} 0</h5>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Tổng thanh toán</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{ $currencyIcon }} <span
                                                    class="total">{{ $cartSubTotal }}</span></h4>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if(cartCount() > 0)
                    <a href="{{ route('checkout.index') }}" class="btn w-100">Tiến hành thanh toán<i
                            class="fi-rs-sign-out ml-15"></i></a>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {



            $(document).on('change', '.qty-val', function() {
                $.ajax({
                    url: "{{ route('cart.update') }}",
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        qty: $(this).val(),
                        id: $(this).data('cart-item')
                    },
                    beforeSend: function() {

                    },
                    success: function(response) {
                        $('.cart-items').html(response.html);
                        $('.cart_sub_total').html(response.cart_sub_total);
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON;
                        Object.values(errors).forEach((err) => notyf.error(err));
                    }
                })
            })

            // handle coupon submit
            $('.coupon-form').on('submit', function(e) {
                e.preventDefault();

                data = $(this).serialize();

                $.ajax({
                    url: "{{ route('cart.coupon') }}",
                    method: 'POST',
                    data: data,
                    beforeSend: function() {
                        $('.coupon-btn').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                        );
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON;
                        Object.values(errors).forEach((err) => notyf.error(err));
                    },
                    complete: function() {
                        $('.coupon-btn').html('<i class="fi-rs-label mr-10"></i>Áp dụng');
                    }
                })
            });

            $('.remove-coupon').on('click', function() {
                $.ajax({
                    url: "{{ route('cart.coupon.destroy') }}",
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    beforeSend: function() {
                        $('.remove-coupon').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                        );
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON;
                        Object.values(errors).forEach((err) => notyf.error(err));
                    },
                    complete: function() {
                        $('.coupon-btn').html('<i class="fi-rs-label mr-10"></i>Áp dụng');
                    }
                })
            });

        })
    </script>
@endpush
