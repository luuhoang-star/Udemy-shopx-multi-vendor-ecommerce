@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Quy tắc vận chuyển</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.shipping-rules.create') }}" class="btn btn-primary">Tạo quy tắc vận chuyển</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên quy tắc</th>
                                <th>Loại phí</th>
                                <th>Đơn tối thiểu</th>
                                <th>Phí giao hàng</th>
                                <th>Trạng thái</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($shippingRules as $shippingRule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $shippingRule->name }}</td>
                                    @if ($shippingRule->type == 'minimum_order_amount')
                                        <td class="text-secondary"><span class="badge bg-info-lt">Theo đơn tối thiểu</span></td>
                                    @else
                                        <td class="text-secondary"><span class="badge bg-purple-lt">Phí cố định</span></td>
                                    @endif
                                    <td class="text-secondary">{{ $shippingRule->minimum_amount ?? 0 }}</td>
                                    <td class="text-secondary fw-bold text-success">{{ $shippingRule->charge }}</td>
                                    @if ($shippingRule->is_active == 1)
                                        <td class="text-secondary"><span class="badge bg-success-lt">Hoạt động</span></td>
                                    @else
                                        <td class="text-secondary"><span class="badge bg-danger-lt">Tạm dừng</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.shipping-rules.edit', $shippingRule) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item"
                                            href="{{ route('admin.shipping-rules.destroy', $shippingRule) }}"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Không có quy tắc vận chuyển nào</td>
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
