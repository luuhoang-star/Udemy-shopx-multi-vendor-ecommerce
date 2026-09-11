@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Phương thức rút tiền</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.withdraw-methods.create') }}" class="btn btn-primary">Tạo phương thức</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên phương thức</th>
                                <th>Số tiền tối thiểu</th>
                                <th>Số tiền tối đa</th>
                                <th>Trạng thái</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($withdrawMethods as $withdrawMethod)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $withdrawMethod->name }}</td>
                                    <td>{{ number_format($withdrawMethod->minimum_amount, 2) }}</td>
                                    <td>{{ number_format($withdrawMethod->maximum_amount, 2) }}</td>
                                    <td>
                                        @if($withdrawMethod->is_active == 1)
                                            <span class="badge bg-success-lt">Hoạt động</span>
                                        @else
                                            <span class="badge bg-danger-lt">Tạm dừng</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.withdraw-methods.edit', $withdrawMethod->id) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item" href="{{ route('admin.withdraw-methods.destroy', $withdrawMethod->id) }}"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Chưa có phương thức rút tiền nào</td>
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
