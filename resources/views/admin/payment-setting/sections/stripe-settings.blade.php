@extends('admin.payment-setting.index')

@section('settings_contents')
    <div class="card-body">
        <h2 class="mb-4">Cấu hình thanh toán Stripe</h2>

        <form action="{{ route('admin.stripe-settings.store') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label required">Trạng thái cổng Stripe</label>
                    <select name="stripe_status" class="form-control" id="">
                        <option @selected(config('settings.stripe_status') == 'active') value="active">Bật (Kích hoạt)</option>
                        <option @selected(config('settings.stripe_status') == 'inactive') value="inactive">Tắt (Vô hiệu)</option>
                    </select>
                    <x-input-error :messages="$errors->get('stripe_status')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Môi trường hoạt động</label>
                    <select name="stripe_mode" class="form-control" id="">
                        <option @selected(config('settings.stripe_mode') == 'sandbox') value="sandbox">Thử nghiệm (Sandbox / Test)</option>
                        <option @selected(config('settings.stripe_mode') == 'live') value="live">Chính thức (Live)</option>
                    </select>
                    <x-input-error :messages="$errors->get('stripe_mode')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Tiền tệ xử lý Stripe</label>
                    <select name="stripe_currency" class="form-control select2" id="">
                        @foreach(config('currencies') as $key => $currency)
                        <option @selected(config('settings.stripe_currency') == $key) value="{{ $key }}">{{ $currency }} ({{ $key }})</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('stripe_currency')" class="mt-2" />
                </div>


                <div class="col-md-6">
                    <label class="form-label required">Tỷ giá quy đổi (So với tiền tệ mặc định)</label>
                    <input type="text" class="form-control" value="{{ config('settings.stripe_rate') }}"
                        name="stripe_rate" placeholder="VD: 1 hoặc 0.00004">
                    <x-input-error :messages="$errors->get('stripe_rate')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Stripe Publishable Key / Client ID</label>
                    <input type="text" class="form-control" value="{{ config('settings.stripe_client_id') }}"
                        name="stripe_client_id" placeholder="pk_test_...">
                    <x-input-error :messages="$errors->get('stripe_client_id')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Stripe Secret Key</label>
                    <input type="password" class="form-control" value="{{ config('settings.stripe_secret') }}"
                        name="stripe_secret" placeholder="sk_test_...">
                    <x-input-error :messages="$errors->get('stripe_secret')" class="mt-2" />
                </div>


            </div>
            <div class="btn-list justify-content-end mt-5">
                <button type="submit" class="btn btn-primary btn-2">Lưu cài đặt</button>
            </div>
        </form>

    </div>
@endsection
