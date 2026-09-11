@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Đánh giá sản phẩm</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="order_table table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th style="width: 300px">Sản phẩm</th>
                                <th>Đánh giá sao</th>
                                <th>Nội dung nhận xét</th>
                                <th>Ngày gửi</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reviews as $review)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            @if($review->product?->primaryImage)
                                                <img style="width: 45px; height: 45px; object-fit: cover; border-radius: 4px;"
                                                    src="{{ asset($review->product->primaryImage->path) }}" alt="">
                                            @endif
                                            <a href="{{ route('products.show', ['slug' => $review->product->slug ?? '']) }}" target="_blank" class="text-body fw-bold">
                                                <p class="mb-0">{{ truncate($review->product?->name ?? '', 50) }}</p>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        @for ($i = 1; $i <= $review->rating; $i++)
                                            <i style="color: #ffc107" class="ti ti-star-filled"></i>
                                        @endfor
                                    </td>
                                    <td>
                                        <div class="text-secondary">{{ $review->review }}</div>
                                    </td>

                                    <td class="text-muted">
                                        {{ date('d/m/Y H:i', strtotime($review->created_at)) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.reviews.destroy', $review) }}" class="btn btn-danger btn-sm delete-item"><i class="ti ti-trash"></i></a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Chưa có đánh giá nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
