@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Trang tùy chỉnh (Custom Pages)</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.custom-pages.create') }}" class="btn btn-primary">Tạo trang mới</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề trang</th>
                                <th>Đường dẫn (Slug)</th>
                                <th>Trạng thái</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pages as $page)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $page->title }}</td>
                                    <td><code>{{ $page->slug }}</code></td>
                                    @if ($page->is_active)
                                        <td class="text-secondary"><span class="badge bg-success-lt">Hoạt động</span></td>
                                    @else
                                        <td class="text-secondary"><span class="badge bg-danger-lt">Tạm dừng</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.custom-pages.edit', $page) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item"
                                            href="{{ route('admin.custom-pages.destroy', $page) }}"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Chưa có trang tùy chỉnh nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
