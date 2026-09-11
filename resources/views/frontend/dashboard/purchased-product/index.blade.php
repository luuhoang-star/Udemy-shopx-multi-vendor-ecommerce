@extends('frontend.dashboard.dashboard-app')

@section('dashboard_contents')

<div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
    <div class="card">
        <div class="card-header p-0">
            <h3 class="mb-0">Sản phẩm số đã mua</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="order_table table m-0 mt-20">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ngày mua</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($digitalProducts as $product)
                        <tr>
                            <td>#{{ $loop->iteration }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ date('d/m/Y', strtotime($product->created_at)) }}</td>
                            <td><a href="{{ route('purchased.products.show', $product->id) }}" class="btn-small d-block">Xem & Tải về</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">Bạn chưa mua sản phẩm số nào.</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
