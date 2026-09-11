@extends('vendor-dashboard.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách sản phẩm</h3>
                <div class="card-actions">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            + Thêm sản phẩm
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('vendor.products.create', ['type' => 'physical']) }}">Sản phẩm vật lý</a></li>
                            <li><a class="dropdown-item" href="{{ route('vendor.products.create', ['type' => 'digital']) }}">Sản phẩm số</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Kho hàng</th>
                                <th>Số lượng</th>
                                <th>Ngày tạo</th>
                                <th>Kiểm duyệt</th>
                                <th>Trạng thái</th>
                                <th>Gian hàng</th>
                                <th class="w-1">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img style="width: 50px; height: 50px; object-fit: cover" src="{{ asset($product->primaryImage?->path) }}"
                                            alt=""></td>
                                    <td>
                                        <div>
                                            @if($product->product_type == 'physical')
                                            <a href="{{ route('vendor.products.edit', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                            @else
                                            <a href="{{ route('vendor.digital-products.edit', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                            @endif
                                        </div>
                                        <small
                                            class="text-muted text-sm text-capitalize">{{ $product->product_type == 'physical' ? 'Vật lý' : 'Kỹ thuật số' }}</small>
                                    </td>
                                    <td>
                                        @if ($product->primaryVariant)
                                            @if ($product->primaryVariant?->special_price > 0)
                                                <div>
                                                    {{ config('settings.site_currency_icon', '$') }}{{ $product->primaryVariant?->special_price }}
                                                </div>
                                                <div class="text-danger text-sm" style="text-decoration: line-through">
                                                    {{ config('settings.site_currency_icon', '$') }}{{ $product->primaryVariant?->price }}
                                                </div>
                                            @else
                                                {{ config('settings.site_currency_icon', '$') }}{{ $product->primaryVariant?->price }}
                                            @endif
                                        @else
                                            @if ($product->special_price > 0)
                                                <div>
                                                    {{ config('settings.site_currency_icon', '$') }}{{ $product->special_price }}
                                                </div>
                                                <div class="text-danger text-sm" style="text-decoration: line-through">
                                                    {{ config('settings.site_currency_icon', '$') }}{{ $product->price }}
                                                </div>
                                            @else
                                                {{ config('settings.site_currency_icon', '$') }}{{ $product->price }}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->primaryVariant)
                                            @if ($product->primaryVariant?->in_stock == 1)
                                                <small class="badge bg-success-lt">Còn hàng</small>
                                            @else
                                                <small class="badge bg-danger-lt">Hết hàng</small>
                                            @endif
                                        @else
                                            @if ($product->in_stock == 1)
                                                <small class="badge bg-success-lt">Còn hàng</small>
                                            @else
                                                <small class="badge bg-danger-lt">Hết hàng</small>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->primaryVariant)
                                            @if ($product->primaryVariant->manage_stock == 1)
                                                {{ $product->primaryVariant->qty }}
                                            @else
                                                ∞
                                            @endif
                                        @else
                                            @if ($product->manage_stock == 'yes')
                                                {{ $product->qty }}
                                            @else
                                                ∞
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        {{ date('d/m/Y', strtotime($product->created_at)) }}
                                    </td>
                                    <td>
                                        @if ($product->approved_status == 'pending')
                                            <span class="badge bg-warning-lt">Chờ duyệt</span>
                                        @elseif ($product->approved_status == 'approved')
                                            <span class="badge bg-success-lt">Đã duyệt</span>
                                        @elseif($product->approved_status == 'rejected')
                                            <span class="badge bg-danger-lt">Từ chối</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->status == 'active')
                                            <span class="badge bg-success-lt">Đang bán</span>
                                        @elseif ($product->status == 'inactive')
                                            <span class="badge bg-secondary-lt">Tạm ẩn</span>
                                        @elseif($product->status == 'pending')
                                            <span class="badge bg-warning-lt">Chờ xử lý</span>
                                        @elseif($product->status == 'draft')
                                            <span class="badge bg-secondary-lt">Bản nháp</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $product->store->name ?? 'N/A' }}
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            @if($product->product_type == 'physical')
                                            <a href="{{ route('vendor.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="ti ti-edit"></i></a>
                                            @else
                                            <a href="{{ route('vendor.digital-products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="ti ti-edit"></i></a>
                                            @endif
                                            <a class="delete-item btn btn-sm btn-danger" href="{{ route('vendor.products.destroy', $product) }}"><i class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center py-4 text-muted">Chưa có sản phẩm nào.</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
