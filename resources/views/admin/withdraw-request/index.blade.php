@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách yêu cầu rút tiền</h3>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Cửa hàng</th>
                                <th>Số tiền rút</th>
                                <th>Phương thức</th>
                                <th>Trạng thái</th>
                                <th>Ngày yêu cầu</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($withdrawRequests as $withdrawRequest)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $withdrawRequest->store?->name }}</td>
                                    <td class="fw-bold text-primary">{{ config('settings.site_currency') }} {{ number_format($withdrawRequest->amount, 2) }}</td>
                                    <td><span class="badge bg-blue-lt">{{ $withdrawRequest->payment_method }}</span></td>
                                    <td>
                                        @if ($withdrawRequest->status == 'pending')
                                            <span class="badge bg-warning-lt">Chờ duyệt</span>
                                        @elseif($withdrawRequest->status == 'paid')
                                            <span class="badge bg-success-lt">Đã thanh toán</span>
                                        @else
                                            <span class="badge bg-danger-lt">Từ chối</span>
                                        @endif
                                    </td>
                                    <td class="text-muted">{{ date('d/m/Y H:i', strtotime($withdrawRequest->created_at)) }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('admin.withdraw-requests.show', $withdrawRequest) }}" title="Xem chi tiết">
                                            <i class="ti ti-eye"></i></a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Không có yêu cầu rút tiền nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
