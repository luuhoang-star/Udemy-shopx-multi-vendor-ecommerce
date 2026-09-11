@extends('frontend.dashboard.dashboard-app')

@section('dashboard_contents')

    <div class="tab-pane fade active show" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="mb-0">Tra cứu hành trình đơn hàng</h3>
            </div>
            <div class="card-body p-0 contact-from-area">
                <p>Để tra cứu hành trình đơn hàng, vui lòng nhập Mã đơn hàng vào ô bên dưới và nhấn nút "Tra cứu". Mã này được cung cấp trên biên nhận và trong email xác nhận đơn hàng của bạn.</p>
                <div class="row">
                    <div class="col-lg-8">
                        <form class="contact-form-style mt-30 mb-50" action="{{ route('track.order.index') }}"
                            method="GET">
                            <div class="input-style mb-20">
                                <label>Mã đơn hàng</label>
                                <input name="order-id" placeholder="Nhập mã đơn hàng..." type="text" value="{{ request('order-id') }}" />
                            </div>
                            <button class="btn" type="submit">Tra cứu</button>
                        </form>
                    </div>
                </div>
                @if ($order)
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="wsus__track_header">
                                <div class="wsus__track_header_text">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>Khách hàng:</h5>
                                                <p>{{ $order->user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>Cửa hàng:</h5>
                                                <p>{{ $order->store->name ?? 'ShopX' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>Trạng thái:</h5>
                                                <p>
                                                    @if ($order->order_status == 'pending')
                                                        Chờ xử lý
                                                    @elseif ($order->order_status == 'processed_and_ready_to_ship')
                                                        Đã xử lý & sẵn sàng giao
                                                    @elseif ($order->order_status == 'dropped_off')
                                                        Đã gửi bưu cục
                                                    @elseif ($order->order_status == 'shipped')
                                                        Đang giao hàng
                                                    @elseif ($order->order_status == 'out_for_delivery')
                                                        Đang trên đường giao
                                                    @elseif ($order->order_status == 'delivered')
                                                        Đã giao hàng
                                                    @elseif ($order->order_status == 'canceled')
                                                        Đã hủy
                                                    @else
                                                        {{ $order->order_status }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>Mã đơn:</h5>
                                                <p>#{{ $order->id }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <ul class="pro_trckr">
                                @forelse($order->orderHistory as $orderHistory)
                                    <li class="check_mark">
                                        @if ($orderHistory->status == 'pending')
                                            Chờ xử lý
                                        @elseif ($orderHistory->status == 'processed_and_ready_to_ship')
                                            Đã xử lý & sẵn sàng giao
                                        @elseif ($orderHistory->status == 'dropped_off')
                                            Đã gửi bưu cục
                                        @elseif ($orderHistory->status == 'shipped')
                                            Đang giao hàng
                                        @elseif ($orderHistory->status == 'out_for_delivery')
                                            Đang trên đường giao
                                        @elseif ($orderHistory->status == 'delivered')
                                            Đã giao hàng
                                        @elseif ($orderHistory->status == 'canceled')
                                            Đã hủy
                                        @else
                                            {{ $orderHistory->status }}
                                        @endif
                                    </li>
                                @empty
                                    <li class="check_mark">Đơn hàng đang chờ xử lý</li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="col-12">
                            <div class="col-12">
                                <div class="track_pro_table">
                                    <div class="table-responsive">
                                        <table class="table table-transparent table-responsive">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 1%">STT</th>
                                                    <th>Sản phẩm</th>
                                                    <th class="text-center" style="width: 5%">SL</th>
                                                    <th class="text-end" style="width: 10%">Đơn giá ({{ $order->currency }})
                                                    </th>
                                                    <th class="text-end" style="width: 10%">Thành tiền ({{ $order->currency }})
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $subtotal = 0;
                                                @endphp
                                                @foreach ($order->orderProducts as $orderProduct)
                                                    @php
                                                        $subtotal +=
                                                            $orderProduct->unit_price * $orderProduct->quantity;
                                                    @endphp
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>
                                                            <p class="strong mb-1">{{ $orderProduct->product->name }}</p>
                                                            <div class="text-secondary w-50 ">
                                                                {{ $orderProduct?->variant['name'] ?? '' }}</div>
                                                        </td>
                                                        <td class="text-center">{{ $orderProduct->quantity }}</td>
                                                        <td class="text-end">{{ $orderProduct->unit_price }}</td>
                                                        <td class="text-end">
                                                            {{ $orderProduct->unit_price * $orderProduct->quantity }}</td>
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
                                                    <td colspan="4" class="font-weight-bold text-uppercase text-end">
                                                        Tổng cộng</td>
                                                    <td class="font-weight-bold text-end">{{ $order->currency }}
                                                        {{ $order->total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
