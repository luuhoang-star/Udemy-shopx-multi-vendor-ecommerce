@extends('admin.payment-setting.index')

@section('settings_contents')
    <div class="card-body">
        <h2 class="mb-4">Cấu hình thanh toán PayPal</h2>

        <form action="{{ route('admin.paypal-settings.store') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label required">Trạng thái cổng PayPal</label>
                    <select name="paypal_status" class="form-control" id="">
                        <option @selected(config('settings.paypal_status') == 'active') value="active">Bật (Kích hoạt)</option>
                        <option @selected(config('settings.paypal_status') == 'inactive') value="inactive">Tắt (Vô hiệu)</option>
                    </select>
                    <x-input-error :messages="$errors->get('paypal_status')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Môi trường hoạt động</label>
                    <select name="paypal_mode" class="form-control" id="">
                        <option @selected(config('settings.paypal_mode') == 'sandbox') value="sandbox">Thử nghiệm (Sandbox)</option>
                        <option @selected(config('settings.paypal_mode') == 'live') value="live">Chính thức (Live)</option>
                    </select>
                    <x-input-error :messages="$errors->get('paypal_mode')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Tiền tệ xử lý PayPal</label>
                    <select name="paypal_currency" class="form-control select2" id="">
                        @foreach(config('currencies') as $key => $currency)
                        <option @selected(config('settings.paypal_currency') == $key) value="{{ $key }}">{{ $currency }} ({{ $key }})</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('paypal_currency')" class="mt-2" />
                </div>


                <div class="col-md-6">
                    <label class="form-label required">Tỷ giá quy đổi (So với tiền tệ mặc định)</label>
                    <input type="text" class="form-control" value="{{ config('settings.paypal_rate') }}"
                        name="paypal_rate" placeholder="VD: 1 hoặc 0.00004">
                    <x-input-error :messages="$errors->get('paypal_rate')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">PayPal Client ID</label>
                    <input type="text" class="form-control" value="{{ config('settings.paypal_client_id') }}"
                        name="paypal_client_id" placeholder="Nhập Client ID...">
                    <x-input-error :messages="$errors->get('paypal_client_id')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">PayPal Secret Key</label>
                    <input type="password" class="form-control" value="{{ config('settings.paypal_secret') }}"
                        name="paypal_secret" placeholder="Nhập Secret Key...">
                    <x-input-error :messages="$errors->get('paypal_secret')" class="mt-2" />
                </div>


            </div>
            <div class="btn-list justify-content-end mt-5">
                <button type="submit" class="btn btn-primary btn-2">Lưu cài đặt</button>
            </div>
        </form>

    </div>
@endsection
