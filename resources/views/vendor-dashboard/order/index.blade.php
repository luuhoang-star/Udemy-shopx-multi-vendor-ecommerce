@extends('vendor-dashboard.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách đơn hàng</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>Mã đơn</th>
                                <th>Khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái đơn</th>
                                <th>Ngày đặt</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>
                                        <div>
                                            {{ $order->user?->name }}
                                        </div>
                                        <div class="text-muted small">
                                            {{ $order->user?->email }}
                                        </div>
                                        <div class="text-muted small">
                                            {{ $order->user?->phone }}
                                        </div>
                                    </td>

                                    <td>
                                        {{ $order->currency }} {{ $order->total }}
                                    </td>
                                    <td>
                                        @if ($order->payment_status == 'paid')
                                            <span class="badge bg-success-lt">Đã thanh toán</span>
                                        @elseif($order->payment_status == 'pending')
                                            <span class="badge bg-warning-lt">Chờ thanh toán</span>
                                        @else
                                            <span class="badge bg-danger-lt">Thất bại</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->order_status == 'pending')
                                            <span class="badge bg-warning-lt">Chờ xử lý</span>
                                        @elseif ($order->order_status == 'processed_and_ready_to_ship')
                                            <span class="badge bg-info-lt">Đã xử lý</span>
                                        @elseif ($order->order_status == 'dropped_off')
                                            <span class="badge bg-primary-lt">Đã gửi bưu cục</span>
                                        @elseif ($order->order_status == 'shipped')
                                            <span class="badge bg-info-lt">Đang giao hàng</span>
                                        @elseif ($order->order_status == 'out_for_delivery')
                                            <span class="badge bg-primary-lt">Đang trên đường giao</span>
                                        @elseif ($order->order_status == 'delivered')
                                            <span class="badge bg-success-lt">Đã giao hàng</span>
                                        @elseif ($order->order_status == 'canceled')
                                            <span class="badge bg-danger-lt">Đã hủy</span>
                                        @else
                                            <span class="badge bg-secondary-lt">{{ $order->order_status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ date('d/m/Y H:i', strtotime($order->created_at)) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('vendor.orders.show', $order) }}"
                                            class="btn btn-sm btn-primary"><i class="ti ti-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Chưa có đơn hàng nào.</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
