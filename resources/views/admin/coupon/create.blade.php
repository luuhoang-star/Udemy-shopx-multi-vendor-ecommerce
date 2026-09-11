@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mã giảm giá mới</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.coupons.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupons.store') }}" method="POST" class="coupon-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Mã giảm giá</label>
                                <input type="text" class="form-control" name="code" placeholder="VD: GIAMGIA50" value="">
                                <x-input-error :messages="$errors->get('code')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Giá trị giảm</label>
                                <input type="text" class="form-control" name="value" placeholder="VD: 50 hoặc 10" value="">
                                <x-input-error :messages="$errors->get('value')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Loại giảm giá</label>
                                <select name="is_percent" id="" class="form-control">
                                    <option value="0">Số tiền cố định (VNĐ/USD)</option>
                                    <option value="1">Phần trăm (%)</option>
                                </select>
                                <x-input-error :messages="$errors->get('is_percent')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Chi tiêu tối thiểu</label>
                                <input type="text" class="form-control" name="minimum_spend" placeholder="0.00"
                                    value="">
                                <x-input-error :messages="$errors->get('minimum_spend')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Chi tiêu tối đa</label>
                                <input type="text" class="form-control" name="maximum_spend" placeholder="0.00"
                                    value="">
                                <x-input-error :messages="$errors->get('maximum_spend')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Giới hạn số lần dùng của mã</label>
                                <input type="text" class="form-control" name="usage_limit_per_coupon" placeholder="VD: 100"
                                    value="">
                                <x-input-error :messages="$errors->get('usage_limit_per_coupon')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Giới hạn số lần dùng mỗi khách hàng</label>
                                <input type="text" class="form-control" name="usage_limit_per_customer" placeholder="VD: 1"
                                    value="">
                                <x-input-error :messages="$errors->get('usage_limit_per_customer')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Ngày bắt đầu</label>
                                <input type="text" class="form-control datepicker" name="start_date" placeholder="Chọn ngày"
                                    value="">
                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Ngày kết thúc</label>
                                <input type="text" class="form-control datepicker" name="end_date" placeholder="Chọn ngày"
                                    value="">
                                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-check form-switch form-switch-3">
                                    <input class="form-check-input" type="checkbox" checked="" name="is_active"
                                        id="status" value="1">
                                    <span class="form-check-label">Kích hoạt</span>
                                </label>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.coupon-form').submit()">Tạo mã giảm giá</button>
            </div>
        </div>
    </div>
@endsection
