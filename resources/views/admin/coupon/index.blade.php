@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tất cả mã giảm giá</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">Tạo mã giảm giá</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã code</th>
                                <th>Giá trị</th>
                                <th>Loại giảm</th>
                                <th>Đã dùng</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Trạng thái</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($coupons as $coupon)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="badge bg-blue-lt fw-bold">{{ $coupon->code }}</span></td>
                                    <td class="text-secondary">{{ $coupon->value }}</td>
                                    <td class="text-info">{{ $coupon->is_percent ? '%' : 'Cố định' }}</td>
                                    <td class="text-secondary">{{ $coupon->used }}</td>
                                    <td class="text-secondary">{{ $coupon->start_date }}</td>
                                    <td class="text-secondary">{{ $coupon->end_date }}</td>
                                    @if ($coupon->is_active)
                                        <td class="text-secondary"><span class="badge bg-success-lt">Hoạt động</span></td>
                                    @else
                                        <td class="text-secondary"><span class="badge bg-danger-lt">Tạm dừng</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item"
                                            href="{{ route('admin.coupons.destroy', $coupon) }}"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">Không có mã giảm giá nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $coupons->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
