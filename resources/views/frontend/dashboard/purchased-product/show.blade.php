@extends('frontend.dashboard.dashboard-app')

@section('dashboard_contents')
    <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
        <div class="card">
            <div class="card-header p-0 d-print-none">
                <h3 class="mb-0">Chi tiết sản phẩm số đã mua</h3>
            </div>
            <div class="card-body p-0">
                <div class="page-wrapper">
                    <!-- BEGIN PAGE BODY -->
                    <div class="page-body">
                        <div class="container-xl">
                            <div class="card card-lg">
                                <div class="card-body">
                                    <div class="row">
                                        <table class="order_table table m-0 mt-20">
                                            <tr>
                                                <td class="font-weight-bold" style="width: 200px;">Tên sản phẩm:</td>
                                                <td>{{ $product->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Gian hàng cung cấp:</td>
                                                <td>{{ $product->store->name ?? 'N/A' }}</td>
                                            </tr>
                                        </table>

                                        <div class="table-responsive">
                                            <table class="order_table table m-0 mt-20">
                                                <thead>
                                                    <tr>
                                                        <th>Tên tệp tin</th>
                                                        <th>Định dạng</th>
                                                        <th>Dung lượng</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($product->files as $file)
                                                        <tr>
                                                            <td>{{ $file->filename }}</td>
                                                            <td><span class="badge bg-secondary">{{ strtoupper($file->extension) }}</span></td>
                                                            <td>{{ calculateFileSize($file->size) }}</td>
                                                            <td>
                                                                <a class="btn btn-sm btn-primary" href="{{ route('purchased.products.download', ['product' => $product->id, 'file' => $file->id]) }}">
                                                                    <i class="fi-rs-download mr-5"></i>Tải về
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4" class="text-center py-3 text-muted">Chưa có tệp tải về nào.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BODY -->

                </div>
            </div>
        </div>
    </div>
@endsection
