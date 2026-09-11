@extends('vendor-dashboard.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Phương thức rút tiền đã lưu</h3>
                <div class="card-actions">
                    <a href="{{ route('vendor.withdraw-methods.create') }}" class="btn btn-primary">+ Thêm phương thức</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Cổng thanh toán</th>
                                <th>Ngày tạo</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($withdrawMethods as $method)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $method->withdrawMethod->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($method->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('vendor.withdraw-methods.edit', $method) }}"
                                            class="text-primary me-2"><i class="ti ti-edit"></i></a>
                                        <a class="text-danger delete-item"
                                            href="{{ route('vendor.withdraw-methods.destroy', $method) }}"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Chưa có phương thức rút tiền nào.</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
