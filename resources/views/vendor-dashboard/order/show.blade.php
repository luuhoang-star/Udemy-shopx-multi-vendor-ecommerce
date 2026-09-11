@extends('vendor-dashboard.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header d-print-none">
                <h3 class="card-title">Chi tiết đơn hàng</h3>
                <div class="card-actions">
                    <a href="{{ route('vendor.orders.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="page-wrapper">
                    <!-- BEGIN PAGE HEADER -->
                    <div class="page-header d-print-none" aria-label="Page header">
                        <div class="container-xl">
                            <div class="row g-2 align-items-center">
                                <div class="col">
                                    <h2 class="page-title">Hóa đơn bán hàng</h2>
                                </div>
                                <!-- Page title actions -->
                                <div class="col-auto ms-auto d-print-none">
                                    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                            <path
                                                d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                                            </path>
                                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                            <path
                                                d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z">
                                            </path>
                                        </svg>
                                        In hóa đơn
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE HEADER -->
                    <!-- BEGIN PAGE BODY -->
                    <div class="page-body">
                        <div class="container-xl">
                            <div class="card card-lg">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="h3">Thông tin thanh toán</p>
                                            <address>
                                                @php
                                                    $billingInfo = $order->billing_info;
                                                    $shippingInfo = $order->shipping_info;
                                                @endphp
                                                {{ $billingInfo['first_name'] }} {{ $billingInfo['last_name'] }}
                                                <br>
                                                {{ $billingInfo['address'] }}, {{ $billingInfo['city'] }},
                                                {{ $billingInfo['state'] }} <br> {{ $billingInfo['country'] }}
                                                <br>
                                                {{ $billingInfo['email'] }}
                                                <br>
                                                {{ $billingInfo['phone'] }}
                                            </address>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="h3">Thông tin giao hàng</p>
                                            <address>
                                                @if ($shippingInfo)
                                                    {{ $shippingInfo['first_name'] }} {{ $shippingInfo['last_name'] }}
                                                    <br>
                                                    {{ $shippingInfo['address'] }}, {{ $shippingInfo['city'] }},
                                                    {{ $shippingInfo['state'] }} <br> {{ $shippingInfo['country'] }}
                                                    <br>
                                                    {{ $shippingInfo['email'] }}
                                                    <br>
                                                    {{ $shippingInfo['phone'] }}
                                                @else
                                                    {{ $billingInfo['first_name'] }} {{ $billingInfo['last_name'] }}
                                                    <br>
                                                    {{ $billingInfo['address'] }}, {{ $billingInfo['city'] }},
                                                    {{ $billingInfo['state'] }} <br> {{ $billingInfo['country'] }}
                                                    <br>
                                                    {{ $billingInfo['email'] }}
                                                    <br>
                                                    {{ $billingInfo['phone'] }}
                                                @endif  
                                            </address>
                                        </div>
                                        <div class="col-12 my-5">
                                            <h1>Hóa đơn #{{ $order->id }}</h1>
                                            <div class="d-flex gap-2 flex-column">
                                                <span>Mã giao dịch: {{ $order->transaction_id ?? 'N/A' }}</span>
                                                <span>Phương thức thanh toán: {{ strtoupper($order->payment_method) }}</span>
                                                <span>Ngày đặt hàng: {{ date('d/m/Y H:i', strtotime($order->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-transparent table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 1%">STT</th>
                                                <th>Sản phẩm</th>
                                                <th class="text-center" style="width: 5%">SL</th>
                                                <th class="text-end" style="width: 10%">Đơn giá ({{ $order->currency }})</th>
                                                <th class="text-end" style="width: 10%">Thành tiền ({{ $order->currency }})</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $subtotal = 0;
                                            @endphp
                                            @foreach($order->orderProducts as $orderProduct)
                                            @php
                                                $subtotal += $orderProduct->unit_price * $orderProduct->quantity;
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    <p class="strong mb-1">{{ $orderProduct->product->name }}</p>
                                                    <div class="text-secondary w-50 ">{{ $orderProduct?->variant['name'] ?? '' }}</div>
                                                </td>
                                                <td class="text-center">{{ $orderProduct->quantity }}</td>
                                                <td class="text-end">{{ $orderProduct->unit_price }}</td>
                                                <td class="text-end">{{ $orderProduct->unit_price * $orderProduct->quantity }}</td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="4" class="strong text-end">Tạm tính</td>
                                                <td class="text-end">{{ $subtotal }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="strong text-end">Giảm giá</td>
                                                <td class="text-end">{{ $order?->discount ?? 0 }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="strong text-end">Phí vận chuyển</td>
                                                <td class="text-end">{{ $order->shipping_charge ?? 0 }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="font-weight-bold text-uppercase text-end">Tổng cộng</td>
                                                <td class="font-weight-bold text-end">{{ $order->currency }} {{ $order->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="text-secondary text-center mt-5">Cảm ơn quý khách đã tin tưởng và ủng hộ gian hàng của chúng tôi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BODY -->


                    @if($order->order_status != 'shipped')
                    <div class="container-xl d-print-none">
                        <div class="card col-md-4 mb-5  ">
                        <div class="card-body">
                            <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="">Cập nhật trạng thái đơn</label>
                                    <select name="order_status" id="" class="form-control">
                                        @foreach(config('order_status') as $key => $status)
                                        @if(in_array($key, ['pending', 'processing', 'packed', 'shipped']))
                                        <option @selected($order->order_status == $key) value="{{ $key }}">{{ str_replace('_', ' ', $key) }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Lưu cập nhật</button>
                            </form>
                        </div>
                    </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
