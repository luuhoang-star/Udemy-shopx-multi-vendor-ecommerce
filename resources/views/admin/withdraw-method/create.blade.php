@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo phương thức rút tiền mới</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.withdraw-methods.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.withdraw-methods.store') }}" method="POST" class="withdraw-method-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tên phương thức</label>
                                <input type="text" class="form-control" name="name" placeholder="VD: Chuyển khoản ngân hàng hoặc PayPal" value="">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Số tiền rút tối thiểu</label>
                                <input type="text" class="form-control" name="minimum_amount" placeholder="0.00" value="">
                                <x-input-error :messages="$errors->get('minimum_amount')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Số tiền rút tối đa</label>
                                <input type="text" class="form-control" name="maximum_amount" placeholder="0.00" value="">
                                <x-input-error :messages="$errors->get('maximum_amount')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Hướng dẫn rút tiền / Thông tin yêu cầu</label>
                                <textarea name="instruction" id="editor"></textarea>
                                <x-input-error :messages="$errors->get('instruction')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-check form-switch form-switch-3">
                                    <input class="form-check-input" type="checkbox" checked="" name="is_active"
                                        id="is_active" value="1">
                                    <span class="form-check-label">Kích hoạt</span>
                                </label>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.withdraw-method-form').submit()">Tạo phương thức</button>
            </div>
        </div>
    </div>
@endsection
