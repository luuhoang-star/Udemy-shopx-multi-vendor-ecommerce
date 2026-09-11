@extends('frontend.dashboard.dashboard-app')

@section('dashboard_contents')
    <div class="wsus__shipping_address mb_40">
        <h4>Thêm địa chỉ mới
            <a href="{{ route('address.index') }}" class="btn btn-primary">Quay lại</a>
        </h4>

        <div class="login_form" id="loginform">
            <div class="panel-body">
                <form action="{{ route('address.store') }}" method="POST">
                    @csrf
                    <div class="row mt-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Họ / Tên đệm *" name="first_name" value="{{ old('first_name') }}">
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Tên *" name="last_name" value="{{ old('last_name') }}">
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Số điện thoại *" name="phone" value="{{ old('phone') }}">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Địa chỉ Email *" name="email" value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" placeholder="Tỉnh / Thành phố *" name="city" value="{{ old('city') }}">
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" placeholder="Quận / Huyện *" name="state" value="{{ old('state') }}">
                                <x-input-error :messages="$errors->get('state')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" placeholder="Mã bưu chính (Zip)" name="zip" value="{{ old('zip') }}">
                                <x-input-error :messages="$errors->get('zip')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="country" class="form-control select-active" id="">
                                    <option value="">Quốc gia *</option>
                                    @foreach (config('countries') as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" placeholder="Địa chỉ chi tiết (Số nhà, tên đường...) *" name="address" value="{{ old('address') }}">
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="is_default" class="form-control">
                                    <option value="">Đặt làm địa chỉ mặc định</option>
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                </select>
                                <x-input-error :messages="$errors->get('is_default')" class="mt-2" />
                            </div>
                        </div>

                    </div>
                    <div class="form-group mb-0">
                        <button class="btn btn-md">Lưu địa chỉ</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
