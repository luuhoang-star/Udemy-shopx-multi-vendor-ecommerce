@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tất cả đơn hàng</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>Mã đơn</th>
                                <th>Khách hàng</th>
                                <th>Mã giao dịch</th>
                                <th>Tổng tiền</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái đơn</th>
                                <th>Ngày đặt</th>
                                <th>Cửa hàng</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td><span class="fw-bold">#{{ $order->id }}</span></td>
                                    <td>
                                        <div class="fw-bold">
                                            {{ $order->user?->name ?? 'Khách vãng lai' }}
                                        </div>
                                        <div class="text-secondary small">
                                            {{ $order->user?->email }}
                                        </div>
                                        <div class="text-secondary small">
                                            {{ $order->user?->phone }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary-lt">{{ $order->transaction_id }}</span>
                                    </td>

                                    <td class="fw-bold text-primary">
                                        {{ $order->currency }} {{ $order->total }}
                                    </td>
                                    <td>
                                        @if($order->payment_status == 'paid')
                                            <span class="badge bg-success-lt">Đã thanh toán</span>
                                        @elseif($order->payment_status == 'pending')
                                            <span class="badge bg-warning-lt">Chờ thanh toán</span>
                                        @else
                                            <span class="badge bg-danger-lt">Thất bại</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $statusMap = [
                                                'pending' => 'Chờ xử lý',
                                                'processing' => 'Đang xử lý',
                                                'shipped' => 'Đang giao hàng',
                                                'delivered' => 'Đã giao thành công',
                                                'cancelled' => 'Đã hủy',
                                            ];
                                        @endphp
                                        <span class="badge bg-blue-lt">{{ $statusMap[$order->order_status] ?? str_replace('_', ' ', $order->order_status) }}</span>
                                    </td>
                                    <td>
                                        {{ date('d/m/Y H:i', strtotime($order->created_at)) }}
                                    </td>

                                    <td>
                                        <span class="badge bg-purple-lt">{{ $order->store?->name ?? 'Hệ thống' }}</span>
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary" title="Xem chi tiết"><i class="ti ti-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">Không có đơn hàng nào</td>
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
