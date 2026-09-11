@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-warning text-white avatar">
                                            <i class="ti ti-shopping-bag-exclamation"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $pendingOrders }} Đơn hàng</div>
                                        <div class="text-secondary">Đơn chờ xử lý</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-success text-white avatar">
                                            <i class="ti ti-shopping-bag-heart"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $completedOrders }} Đơn hàng</div>
                                        <div class="text-secondary">Đơn đã hoàn thành</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-danger text-white avatar">
                                            <i class="ti ti-shopping-bag-x"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $canceledOrders }} Đơn hàng</div>
                                        <div class="text-secondary">Đơn hàng đã hủy</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <i class="ti ti-shopping-bag-plus"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalOrders }} Đơn hàng</div>
                                        <div class="text-secondary">Tổng số đơn hàng</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-success text-white avatar">
                                            <i class="ti ti-box"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalProducts }} Sản phẩm</div>
                                        <div class="text-secondary">Tổng số sản phẩm</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-warning text-white avatar">
                                            <i class="ti ti-box"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalPendingProducts }} Sản phẩm</div>
                                        <div class="text-secondary">Sản phẩm chờ duyệt</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-success text-white avatar">
                                            <i class="ti ti-box"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalApprovedProducts }} Sản phẩm</div>
                                        <div class="text-secondary">Sản phẩm đã duyệt</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-danger text-white avatar">
                                            <i class="ti ti-box"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalRejectedProducts }} Sản phẩm</div>
                                        <div class="text-secondary">Sản phẩm bị từ chối</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-warning text-white avatar">
                                            <i class="ti ti-user"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalPendingKycRequests }} Yêu cầu</div>
                                        <div class="text-secondary">KYC chờ xét duyệt</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-success text-white avatar">
                                            <i class="ti ti-user-check"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalApprovedKycRequests }} Yêu cầu</div>
                                        <div class="text-secondary">KYC đã phê duyệt</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-danger text-white avatar">
                                            <i class="ti ti-user-x"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalRejectedKycRequests }} Yêu cầu</div>
                                        <div class="text-secondary">KYC bị từ chối</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-purple text-white avatar">
                                            <i class="ti ti-user"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalKycRequests }} Yêu cầu</div>
                                        <div class="text-secondary">Tổng yêu cầu KYC</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="col-12">

                <div class="row row-cards">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Phân tích & Thống kê đơn hàng</h3>

                                <div class="card-actions">
                                    <form action="">
                                        <select name="month" class="form-control" onchange="this.form.submit()">
                                            @foreach ($months as $m)
                                                <option value="{{ $m['value'] }}" @selected($m['value'] == $month)>
                                                    {{ $m['label'] }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <div id="ordersChart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Doanh thu & Hoa hồng ({{ date('Y') }})</h3>
                            </div>

                            <div class="card-body " style="padding-top:40px; padding-bottom:73px">
                                <div id="yearlyDonutChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Yêu cầu KYC chờ duyệt</h3>
                            </div>
                            <div class="card-body">
                                <div class="divide-y">
                                    @forelse ($pendingKycs as $kyc)
                                        <div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <span class="avatar avatar-1"
                                                        style="background-image: url({{ asset($kyc->user->avatar) }})">
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">{{ $kyc->full_name }}</div>
                                                    <div class="text-secondary">{{ $kyc->created_at->diffForHumans() }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center text-secondary py-3">Không có yêu cầu nào</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Đơn hàng mới chờ xử lý</h3>
                            </div>
                            <div class="card-body">
                                <div class="divide-y">
                                    @forelse ($recentPendingOrders as $order)
                                        <div>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('admin.orders.show', $order->id) }}">
                                                        <div class="text-truncate">#{{ $order->id }} -
                                                            {{ $order->customer_first_name }} <span
                                                                class="text-secondary">({{ $order->customer_email }})</span>
                                                        </div>
                                                    </a>
                                                    <div class="text-secondary">{{ $order->created_at->diffForHumans() }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center text-secondary py-3">Không có đơn hàng nào</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Sản phẩm chờ phê duyệt</h3>
                            </div>
                            <div class="card-body">
                                <div class="divide-y">
                                    @forelse ($pendingProducts as $product)
                                        <div>
                                            <div class="row">
                                                <div class="col">
                                                    @if ($product->product_type == 'physical')
                                                        <a href="{{ route('admin.products.edit', $product->id) }}">
                                                            <div class="text-truncate">{{ $product->name }}</div>
                                                        </a>
                                                    @else
                                                        <a
                                                            href="{{ route('admin.digital-products.edit', $product->id) }}">
                                                            <div class="text-truncate">{{ $product->name }}</div>
                                                        </a>
                                                    @endif
                                                    <div class="text-secondary">
                                                        {{ $product->created_at->diffForHumans() }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center text-secondary py-3">Không có sản phẩm nào</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var options = {
            chart: {
                height: 400,
                type: 'line'
            },
            series: [{
                name: "Đơn hàng",
                type: 'column',
                data: @json($ordersData)
            }, {
                name: "Tổng giá trị",
                type: 'line',
                data: @json($amountData)
            }, {
                name: "Tiền hoa hồng",
                type: 'line',
                data: @json($commissionData)
            }],
            xaxis: {
                categories: @json($dates)
            },
            yaxis: [{
                    seriesName: "Đơn hàng",
                    title: {
                        text: "Số lượng đơn"
                    },
                    labels: {
                        formatter: function(val) {
                            return val.toFixed(0);
                        }
                    }
                },
                {
                    seriesName: "Tổng giá trị",
                    opposite: true, // shows on right side
                    title: {
                        text: "Tổng giá trị"
                    },
                    labels: {
                        formatter: function(val) {
                            return val.toFixed(2);
                        }
                    }
                },
                {
                    seriesName: "Tiền hoa hồng",
                    opposite: true,
                    show: false
                }
            ],
            stroke: {
                width: [0, 3, 3],
                curve: 'smooth'
            },
            markers: {
                size: 4
            },
            colors: ['#1E90FF', '#FF4500', '#32CD32'],
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function(val) {
                        return val.toFixed(2);
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#ordersChart"), options);
        chart.render();

        var donutOptions = {
            chart: {
                type: 'donut',
                width: 400
            },
            series: [{{ $totalSales }}, {{ $totalCommission }}],
            labels: ['Tổng doanh số bán', 'Doanh thu hoa hồng'],
            colors: ['#008FFB', '#00E396'],
            legend: {
                position: 'bottom'
            },

            tooltip: {
                y: {
                    formatter: function(val, {
                        seriesIndex
                    }) {
                        if (seriesIndex == 0) {
                            return "{{ config('settings.site_currency_icon') }}" + val;
                        }

                        return "{{ config('settings.site_currency_icon') }}" + val.toFixed(2);
                    }
                }
            }

        }

        var donutChart = new ApexCharts(document.querySelector("#yearlyDonutChart"), donutOptions);
        donutChart.render();
    </script>
@endpush
