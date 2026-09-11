@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách Slider</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Tạo Slider mới</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Tiêu đề phụ</th>
                                <th>Trạng thái</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img style="width: 100px; height: 50px; object-fit: cover; border-radius: 4px;" src="{{ asset($slider->image) }}" alt=""></td>
                                    <td class="fw-bold">{{ $slider->title }}</td>
                                    <td class="text-secondary">{{ $slider->sub_title }}</td>
                                    @if ($slider->is_active)
                                        <td class="text-secondary"><span class="badge bg-success-lt">Hoạt động</span></td>
                                    @else
                                        <td class="text-secondary"><span class="badge bg-danger-lt">Tạm dừng</span></td>
                                    @endif

                                    <td>
                                        <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item"
                                            href="{{ route('admin.sliders.destroy', $slider) }}"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Chưa có slider nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
