@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo ưu đãi mới</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.offer-sliders.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.offer-sliders.store') }}" method="POST" class="coupon-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tiêu đề ưu đãi</label>
                                <input type="text" class="form-control" name="title" placeholder="VD: Miễn phí vận chuyển cho đơn hàng từ 500k" value="">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Đường dẫn liên kết (URL)</label>
                                <input type="text" class="form-control" name="url" placeholder="https://..." value="">
                                <x-input-error :messages="$errors->get('url')" class="mt-2" />
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
                <button class="btn btn-primary mt-3" onclick="$('.coupon-form').submit()">Tạo ưu đãi</button>
            </div>
        </div>
    </div>
@endsection
