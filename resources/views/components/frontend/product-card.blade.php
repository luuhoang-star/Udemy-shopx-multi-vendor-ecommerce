@props(['class' => 'col-6 col-xxl-3 col-lg-4 col-md-4 col-sm-6'])

<div {{ $attributes }} class="{{ $class }}">
    <div class="product-cart-wrap mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="{{ route('products.show', $product->slug) }}">
                    @foreach ($product->images as $key => $image)
                        <img class="{{ $key == 0 ? 'default-img' : 'hover-img' }}" src="{{ asset($image->path) }}"
                            alt="" />
                    @endforeach
                </a>
            </div>
            <div class="product-action-1">

                <a aria-label="Yêu thích" class="action-btn wishlist-btn" data-id="{{ $product->id }}" href="">
                    @if(in_array($product->id, $wishlistsProductIds))
                    <i class="fi fi-ss-heart"></i>
                    @else
                    <i class="fi-rs-heart"></i>
                    @endif
                    </a>
                <a href="{{ route('products.show', $product->slug) }}" aria-label="Xem chi tiết" class="action-btn"><i
                        class="fi-rs-eye"></i></a>
            </div>
            <div class="product-badges product-badges-position product-badges-mrg">
                @if ($product->is_hot == 1)
                    <span class="hot">HOT</span>
                @endif
                @if ($product->is_new == 1)
                    <span class="hot ms-1">MỚI</span>
                @endif
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
            </div>
            <h2><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h2>
            <div class="product-rate-cover">
                <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: {{ ratingPercent($product->reviews_avg_rating) }}%"></div>
                </div>
                <span class="font-small ml-5 text-muted"> ({{ round($product->reviews_avg_rating, 2) ?? 0 }})</span>
            </div>
            <div>
                <span class="font-small text-muted">Bởi <a
                        href="{{ route('vendors.show', $product->store?->seller_id ?? $product->store?->id ?? 1) }}">{{ $product->store->name ?? 'ShopX' }}</a></span>
            </div>
            <div class="product-card-bottom">
                <div class="product-price">
                    @php
                        $price = $product->getEffectivePriceAndStock();
                        $currencyIcon = config('settings.site_currency_icon', '$');
                    @endphp

                    @if ($price['in_stock'])

                        @if ($price['old_price'] > 0)
                            <span>{{ $currencyIcon }}{{ $price['price'] }}</span>
                            <span class="old-price">{{ $currencyIcon }}{{ $price['old_price'] }}</span>
                        @else
                            <span>{{ $currencyIcon }}{{ $price['price'] }}</span>
                        @endif
                    @else
                        <span class="text-danger">Hết hàng</span>
                    @endif



                </div>
                @if ($price['in_stock'])
                <div class="add-cart">
                    <a class="add add_to_cart" data-id="{{ $product->id }}"
                        data-modal="{{ $product->primaryVariant ? 'true' : 'false' }}" href=""><i
                            class="fi-rs-shopping-cart mr-5"></i>Thêm vào giỏ</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
