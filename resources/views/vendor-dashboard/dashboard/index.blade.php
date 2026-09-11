@extends('vendor-dashboard.layouts.app')

@section('contents')
    <div class="container-xl">
        @if (auth('web')->user()->kyc?->status == 'pending')
            <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                <div class="alert-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon alert-icon icon-2">
                        <path d="M12 9v4"></path>
                        <path
                            d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                        </path>
                        <path d="M12 16h.01"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="alert-heading">Hồ sơ KYC đang chờ duyệt</h4>
                    <div class="alert-description">Vui lòng chờ quản trị viên phê duyệt hồ sơ xác minh KYC của bạn.</div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        @if (auth('web')->user()->kyc?->status == 'rejected' || auth('web')->user()->kyc?->status == null)
            <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                <div class="alert-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon alert-icon icon-2">
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                        <path d="M12 8v4"></path>
                        <path d="M12 16h.01"></path>
                    </svg>
                </div>
                <div class="w-100">
                    <h4 class="alert-heading">Vui lòng xác minh danh tính (KYC)</h4>
                    <div class="alert-description d-flex justify-content-between align-items-center ">
                        <span>Vui lòng gửi hồ sơ xác minh KYC để bắt đầu hoạt động kinh doanh trên hệ thống.</span>
                        <div>
                            <a href="{{ route('kyc.index') }}" class="btn btn-6 btn-outline-light">Gửi hồ sơ KYC</a>
                        </div>
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif

        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span
                                            class="bg-warning text-white avatar">
                                            <i class="ti ti-shopping-bag-exclamation"></i></span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $pendingOrders }} Đơn</div>
                                        <div class="text-secondary">Đơn hàng chờ xử lý</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span
                                            class="bg-success text-white avatar">
                                            <i class="ti ti-shopping-bag-heart"></i></span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $completedOrders }} Đơn</div>
                                        <div class="text-secondary">Đơn đã hoàn thành</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span
                                            class="bg-danger text-white avatar">
                                            <i class="ti ti-shopping-bag-x"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $canceledOrders }} Đơn</div>
                                        <div class="text-secondary">Đơn hàng đã hủy</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span
                                            class="bg-primary text-white avatar">
                                            <i class="ti ti-shopping-bag-plus"></i></span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalOrders }} Đơn</div>
                                        <div class="text-secondary">Tổng số đơn hàng</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span
                                            class="bg-success text-white avatar">
                                            <i class="ti ti-box"></i></span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalProducts }} Sản phẩm</div>
                                        <div class="text-secondary">Tổng số sản phẩm</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span
                                            class="bg-info text-white avatar">
                                            <i class="ti ti-box"></i></span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalDigitalProducts }} Sản phẩm</div>
                                        <div class="text-secondary">Sản phẩm số</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span
                                            class="bg-purple text-white avatar">
                                            <i class="ti ti-box"></i></span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ $totalPhysicalProducts }} Sản phẩm</div>
                                        <div class="text-secondary">Sản phẩm vật lý</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
