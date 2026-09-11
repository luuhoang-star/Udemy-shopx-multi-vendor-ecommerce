            <div class="col-lg-3 col-xxl-2 primary-sidebar sticky-sidebar">

                <div class="sidebar_filter d-lg-none">Bộ lọc</div>

                <div class="sidebar_wraper">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Danh mục</h5>

                        <ul class="main_category">
                            @foreach ($categories as $category)
                                <li class="{{ request()->category == $category->slug ? 'active' : '' }}">
                                    <a href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}
                                    </a>
                                    @if ($category->children_nested->count() > 0)
                                        <ul class="sub_category">
                                            @foreach ($category->children_nested as $child)
                                                <li class="{{ request()->category == $child->slug ? 'active' : '' }}">
                                                    <a
                                                        href="{{ route('products.index', ['category' => $child->slug]) }}">{{ $child->name }}</a>
                                                    @if ($child->children_nested->count() > 0)
                                                        <ul class="child_category">
                                                            @foreach ($child->children_nested as $subchild)
                                                                <li
                                                                    class="{{ request()->category == $subchild->slug ? 'active' : '' }}">
                                                                    <a
                                                                        href="{{ route('products.index', ['category' => $subchild->slug]) }}">{{ $subchild->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <h5 class="section-title style-1 mb-30">Lọc theo giá</h5>
                        <form action="{{ url()->current() }}" method="get">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" class="mb-20"></div>
                                    <div class="d-flex justify-content-between">
                                        <div class="caption">Từ: <strong id="slider-range-value1"
                                                class="text-brand"></strong>
                                        </div>
                                        <div class="caption">Đến: <strong id="slider-range-value2"
                                                class="text-brand"></strong>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="from" id="price_from" value="">
                                <input type="hidden" name="to" id="price_to" value="">
                            </div>
                            <div class="list-group">
                                <div class="list-group-item mb-10 mt-10">
                                    <label class="fw-900">Thương hiệu</label>
                                    <div class="custome-checkbox">
                                        @foreach ($brands as $brand)
                                            <input @checked(in_array($brand->id, request('brands') ?? [])) class="form-check-input" type="checkbox"
                                                name="brands[]" id="brand-{{ $brand->id }}"
                                                value="{{ $brand->id }}" />
                                            <label class="form-check-label"
                                                for="brand-{{ $brand->id }}"><span>{{ $brand->name }}
                                                    ({{ $brand->products_count }})
                                                </span></label>
                                            <br />
                                        @endforeach
                                    </div>
                                    <label class="fw-900 mt-15">Thẻ sản phẩm</label>
                                    <div class="custome-checkbox">
                                        @foreach ($tags as $tag)
                                            <input @checked(in_array($tag->id, request('tags') ?? [])) class="form-check-input" type="checkbox"
                                                name="tags[]" id="tag-{{ $tag->id }}"
                                                value="{{ $tag->id }}" />
                                            <label class="form-check-label"
                                                for="tag-{{ $tag->id }}"><span>{{ $tag->name }}
                                                    ({{ $tag->products_count }})
                                                </span></label>
                                            <br />
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-default"><i
                                    class="fi-rs-filter mr-5"></i>
                                Áp dụng lọc</button>
                        </form>
                    </div>

                    @if(data_get($ads, 'side_banner_three.0.image'))
                    <a href="{{ data_get($ads, 'side_banner_three.0.url', '') }}" class="banner-img wow fadeIn d-block">
                        <img src="{{ asset(data_get($ads, 'side_banner_three.0.image', '')) }}" alt="" />
                    </a>
                    @endif
                </div>

            </div>


            @push('scripts')
                <script>
                    $(function() {
                        // Slider Range JS
                        if ($("#slider-range").length) {
                            $(".noUi-handle").on("click", function() {
                                $(this).width(50);
                            });
                            var rangeSlider = document.getElementById("slider-range");
                            var currencyPrefix = "{{ config('settings.site_currency_icon', '$') }}";
                            var moneyFormat = wNumb({
                                decimals: 0,
                                thousand: ",",
                                prefix: currencyPrefix
                            });
                            noUiSlider.create(rangeSlider, {
                                start: [{{ request('from') ?? 0 }}, {{ request('to') ?? 1000 }}],
                                step: 1,
                                range: {
                                    min: [0],
                                    max: [2000]
                                },
                                format: moneyFormat,
                                connect: true
                            });

                            rangeSlider.noUiSlider.on("update", function(values, handle) {
                                document.getElementById("slider-range-value1").innerHTML = values[0];
                                document.getElementById("slider-range-value2").innerHTML = values[1];
                                document.getElementById("price_from").value = moneyFormat.from(values[0]);
                                document.getElementById("price_to").value = moneyFormat.from(values[1]);
                            });
                        }
                    })
                </script>
            @endpush
