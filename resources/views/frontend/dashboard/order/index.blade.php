@extends('frontend.dashboard.dashboard-app')

@section('dashboard_contents')

<div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
    <div class="card">
        <div class="card-header p-0">
            <h3 class="mb-0">Đơn hàng của bạn</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="order_table table m-0 mt-20">
                    <thead>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Cửa hàng</th>
                            <th>Ngày đặt</th>
                            <th>Thanh toán</th>
                            <th>Trạng thái đơn</th>
                            <th>Tổng tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->store->name ?? 'ShopX' }}</td>
                            <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                            <td>
                                @if($order->payment_status == 'paid')
                                    <span class="badge bg-success">Đã thanh toán</span>
                                @elseif($order->payment_status == 'pending')
                                    <span class="badge bg-warning">Chờ thanh toán</span>
                                @else
                                    <span class="badge bg-danger">Thất bại</span>
                                @endif
                            </td>
                            <td>
                                @if ($order->order_status == 'pending')
                                    <span class="badge bg-warning">Chờ xử lý</span>
                                @elseif ($order->order_status == 'processed_and_ready_to_ship')
                                    <span class="badge bg-info">Đã xử lý & sẵn sàng giao</span>
                                @elseif ($order->order_status == 'dropped_off')
                                    <span class="badge bg-primary">Đã gửi bưu cục</span>
                                @elseif ($order->order_status == 'shipped')
                                    <span class="badge bg-info">Đang giao hàng</span>
                                @elseif ($order->order_status == 'out_for_delivery')
                                    <span class="badge bg-primary">Đang trên đường giao</span>
                                @elseif ($order->order_status == 'delivered')
                                    <span class="badge bg-success">Đã giao hàng</span>
                                @elseif ($order->order_status == 'canceled')
                                    <span class="badge bg-danger">Đã hủy</span>
                                @else
                                    <span class="badge bg-secondary">{{ $order->order_status }}</span>
                                @endif
                            </td>
                            <td> {{ $order->currency }} {{ $order->total }}</td>
                            <td><a href="{{ route('orders.show', $order) }}" class="btn-small d-block">Xem chi tiết</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Bạn chưa có đơn hàng nào.</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
