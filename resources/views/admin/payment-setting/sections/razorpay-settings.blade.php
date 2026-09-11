@extends('admin.payment-setting.index')

@section('settings_contents')
    <div class="card-body">
        <h2 class="mb-4">Cấu hình thanh toán Razorpay</h2>

        <form action="{{ route('admin.razorpay-settings.store') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label required">Trạng thái cổng Razorpay</label>
                    <select name="razorpay_status" class="form-control" id="">
                        <option @selected(config('settings.razorpay_status') == 'active') value="active">Bật (Kích hoạt)</option>
                        <option @selected(config('settings.razorpay_status') == 'inactive') value="inactive">Tắt (Vô hiệu)</option>
                    </select>
                    <x-input-error :messages="$errors->get('razorpay_status')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Tiền tệ xử lý Razorpay</label>
                    <select name="razorpay_currency" class="form-control select2" id="">
                        @foreach(config('currencies') as $key => $currency)
                        <option @selected(config('settings.razorpay_currency') == $key) value="{{ $key }}">{{ $currency }} ({{ $key }})</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('razorpay_currency')" class="mt-2" />
                </div>


                <div class="col-md-6">
                    <label class="form-label required">Tỷ giá quy đổi (So với tiền tệ mặc định)</label>
                    <input type="text" class="form-control" value="{{ config('settings.razorpay_rate') }}"
                        name="razorpay_rate" placeholder="VD: 1 hoặc 0.00004">
                    <x-input-error :messages="$errors->get('razorpay_rate')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Razorpay Key ID / Client ID</label>
                    <input type="text" class="form-control" value="{{ config('settings.razorpay_client_id') }}"
                        name="razorpay_client_id" placeholder="rzp_test_...">
                    <x-input-error :messages="$errors->get('razorpay_client_id')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Razorpay Secret Key</label>
                    <input type="password" class="form-control" value="{{ config('settings.razorpay_secret') }}"
                        name="razorpay_secret" placeholder="Nhập Secret Key...">
                    <x-input-error :messages="$errors->get('razorpay_secret')" class="mt-2" />
                </div>


            </div>
            <div class="btn-list justify-content-end mt-5">
                <button type="submit" class="btn btn-primary btn-2">Lưu cài đặt</button>
            </div>
        </form>

    </div>
@endsection
