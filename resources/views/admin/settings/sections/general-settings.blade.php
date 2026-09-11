@extends('admin.settings.index')

@section('settings_contents')
    <div class="card-body">
        <h2 class="mb-4">Cài đặt chung</h2>

        <form action="{{ route('admin.settings.general') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label required">Tên website</label>
                    <input type="text" class="form-control" value="{{ config('settings.site_name') }}" name="site_name">
                    <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
                </div>
                <div class="col-md-6">
                    <label class="form-label required">Email liên hệ website</label>
                    <input type="text" class="form-control" value="{{ config('settings.site_email') }}" name="site_email">
                    <x-input-error :messages="$errors->get('site_email')" class="mt-2" />
                </div>
                <div class="col-md-6">
                    <label class="form-label required">Số điện thoại website</label>
                    <input type="text" class="form-control" value="{{ config('settings.site_phone') }}" name="site_phone">
                    <x-input-error :messages="$errors->get('site_phone')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Tiền tệ mặc định</label>
                    <select name="site_currency" id="" class="form-control select2">
                        @foreach(config('currencies') as $key => $currency)
                        <option @selected($key == config('settings.site_currency')) value="{{ $key }}">{{ $currency }} ({{ $key }})</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('site_currency')" class="mt-2" />
                </div>

                <div class="col-md-6">
                    <label class="form-label required">Ký hiệu tiền tệ</label>
                    <input type="text" class="form-control" value="{{ config('settings.site_currency_icon') }}" name="site_currency_icon" placeholder="$, ₫, đ, vnđ...">
                    <x-input-error :messages="$errors->get('site_currency_icon')" class="mt-2" />
                </div>
            </div>
            <div class="btn-list justify-content-end mt-5">
                <button type="submit" class="btn btn-primary btn-2">Lưu cài đặt</button>
            </div>
        </form>

    </div>
@endsection
