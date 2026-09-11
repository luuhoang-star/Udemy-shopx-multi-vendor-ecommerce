@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách vai trò (Roles)</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Tạo vai trò mới</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên vai trò</th>
                                <th>Số quyền hạn</th>
                                <th class="w-1">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $role->name }}</td>
                                    <td><span class="badge bg-primary-lt">{{ $role->permissions_count }} quyền</span></td>
                                    <td>
                                        @if($role->name != 'Super Admin')
                                        <a href="{{ route('admin.role.edit', $role) }}" class="btn btn-sm btn-outline-primary me-1"><i class="ti ti-edit"></i> Sửa</a>
                                        <a class="btn btn-sm btn-outline-danger delete-item" href="{{ route('admin.role.destroy', $role) }}"><i class="ti ti-trash"></i> Xóa</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Chưa có vai trò nào</td>
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
