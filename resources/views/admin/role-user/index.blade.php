@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Quản trị viên & Phân quyền</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.role-users.create') }}" class="btn btn-primary">Thêm quản trị viên</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th class="w-1">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @foreach($admin->getRoleNames() as $role)
                                            <span class="badge bg-primary-lt">{{ $role }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if(!$admin->hasRole('Super Admin'))
                                            <a href="{{ route('admin.role-users.edit', $admin) }}" class="btn btn-sm btn-outline-primary me-1"><i class="ti ti-edit"></i> Sửa</a>
                                            <a class="btn btn-sm btn-outline-danger delete-item" href="{{ route('admin.role-users.destroy', $admin) }}"><i class="ti ti-trash"></i> Xóa</a>
                                        @else
                                            <span class="badge bg-secondary-lt">Quản trị viên tối cao</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Chưa có quản trị viên nào</td>
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
