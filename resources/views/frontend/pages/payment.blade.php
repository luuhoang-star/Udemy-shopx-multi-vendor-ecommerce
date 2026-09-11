@extends('frontend.layouts.app')

@php
    $currencyIcon = config('settings.site_currency_icon', '$');
@endphp

@section('contents')
    <div class="container mb-60 mt-65">
        <div class="wsus__payment_area">
            <div class="row">
                <div class="col-12 col-xl-8 wow fadeInUp">
                    <h4>Chọn phương thức thanh toán</h4>
                    <div class="row mt-10">
                        <div class="col-6 col-md-4 col-lg-3 col-xl-3 wow fadeInUp">
                            <a href="{{ route('paypal.payment') }}" class="wsus__payment_method">
                                <img src="{{ asset('assets/frontend/dist/imgs/paypal.png') }}" alt="payment"
                                    class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-3 wow fadeInUp">
                            <a href="{{ route('stripe.payment') }}" class="wsus__payment_method">
                                <img src="{{ asset('assets/frontend/dist/imgs/stripe.png') }}" alt="payment"
                                    class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-3 wow fadeInUp">
                            <a href="{{ route('razorpay.redirect') }}" class="wsus__payment_method">
                                <img src="{{ asset('assets/frontend/dist/imgs/razorpay.png') }}" alt="payment"
                                    class="img-fluid w-100">
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="wsus__billing_summary">
                        <h4>Tóm tắt đơn hàng</h4>
                        @foreach ($groupedCartItems as $key => $cartItems)
                            <h5 class="vendor_name">{{ $cartItems['store']->name }}</h5>
                            <ul class="wsus__billing_product">
                                @foreach ($cartItems['items'] as $cartItem)
                                    @php
                                        $price = $cartItem->product->getVariantOrProductPriceAndStock(
                                            $cartItem->variant_id,
                                        );
                                    @endphp
                                    <li>
                                        <a href="{{ route('products.show', $cartItem->product->slug) }}" class="img">
                                            <img src="{{ asset($cartItem->product?->primaryImage?->path) }}" alt="product"
                                                class="img-fluid w-100">
                                        </a>
                                        <div class="text cart-item-title">
                                            <a style="font-size: 16px; font-weight: 700;"
                                                href="{{ route('products.show', $cartItem->product->slug) }}">{{ truncate($cartItem->product->name) }}</a>

                                            <span>{{ $cartItem->product?->variants()->where('id', $cartItem->variant_id)->first()->name ?? '' }}</span>
                                            <h6>{{ $currencyIcon }}{{ $price['price'] }} x {{ $cartItem->quantity }}</h6>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        @endforeach

                        <div class="wsus__total_price">
                            @php
                                $cartSubTotal = cartTotal();
                                $cartDiscount = cartDiscount();
                            @endphp

                            <h3>Tạm tính <span>{{ $currencyIcon }} {{ $cartSubTotal }}</span></h3>
                            <p>Phí vận chuyển <span class="">{{ $currencyIcon }} <span
                                        class="shipping_charge">{{ $shippingCharge }}</span></span>
                            </p>
                            <p>Giảm giá <span>{{ $currencyIcon }} {{ $cartDiscount }}</span></p>
                        </div>
                        <h5>Tổng thanh toán <span>{{ $currencyIcon }} <span
                                    class="grand_total">{{ max(0, $cartSubTotal + $shippingCharge - $cartDiscount) }}</span></span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
