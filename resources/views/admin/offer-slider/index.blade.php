@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thanh trượt ưu đãi (Offer Slider)</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.offer-sliders.create') }}" class="btn btn-primary">Tạo ưu đãi mới</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Trạng thái</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($offers as $offer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $offer->title }}</td>
                                    @if ($offer->is_active)
                                        <td class="text-secondary"><span class="badge bg-success-lt">Hoạt động</span></td>
                                    @else
                                        <td class="text-secondary"><span class="badge bg-danger-lt">Tạm dừng</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.offer-sliders.edit', $offer) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item"
                                            href="{{ route('admin.offer-sliders.destroy', $offer) }}"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Chưa có ưu đãi nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $offers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
