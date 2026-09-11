@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Đặc điểm nổi bật (Our Features)</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.our-features.create') }}" class="btn btn-primary">Tạo đặc điểm mới</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Biểu tượng</th>
                                <th>Tiêu đề</th>
                                <th>Trạng thái</th>
                                <th class="w-100px">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($features as $feature)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img style="width: 40px; height: 40px; object-fit: contain;" src="{{ asset($feature->icon) }}" alt="">
                                    </td>
                                    <td class="fw-bold">{{ $feature->title }}</td>
                                    <td>
                                        @if($feature->status == 1)
                                        <span class="badge bg-primary-lt">Hoạt động</span>
                                        @else
                                        <span class="badge bg-danger-lt">Tạm dừng</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.our-features.edit', $feature) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item" href="{{ route('admin.our-features.destroy', $feature) }}"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Chưa có đặc điểm nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $features->links() }}
                  </div>
            </div>
        </div>
    </div>
@endsection
