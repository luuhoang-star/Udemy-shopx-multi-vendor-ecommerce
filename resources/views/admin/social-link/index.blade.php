@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liên kết mạng xã hội</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary">Thêm liên kết mới</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Biểu tượng</th>
                                <th>Đường dẫn liên kết</th>
                                <th>Trạng thái</th>
                                <th class="w-100px">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($socialLinks as $link)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img style="width: 35px; height: 35px; object-fit: contain; background-color: #f1f3f5; padding: 4px; border-radius: 4px;" src="{{ asset($link->icon) }}" alt="">
                                    </td>
                                    <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
                                    <td>
                                        @if($link->status == 1)
                                        <span class="badge bg-primary-lt">Hoạt động</span>
                                        @else
                                        <span class="badge bg-danger-lt">Tạm dừng</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.social-links.edit', $link) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item" href="{{ route('admin.social-links.destroy', $link) }}"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Chưa có liên kết mạng xã hội nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $socialLinks->links() }}
                  </div>
            </div>
        </div>
    </div>
@endsection
