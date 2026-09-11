<article class="row align-items-center hover-up">
    <figure class="col-sm-4 mb-0">
        <a href="{{ route('products.show', $product->slug) }}"><img src="{{ asset($product?->primaryImage?->path) }}" alt="" /></a>
    </figure>
    <div class="col-sm-8 mb-0">
        <h6>
            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
        </h6>
        <div class="product-rate-cover">
            <div class="product-rate d-inline-block">
                <div class="product-rating" style="width: {{ ratingPercent($product->reviews_avg_rating) }}%"></div>
            </div>
            <span class="font-small ml-5 text-muted"> ({{ round($product->reviews_avg_rating, 2) }})</span>
        </div>
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
    </div>
</article>
