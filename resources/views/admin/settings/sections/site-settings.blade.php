@extends('admin.settings.index')

@section('settings_contents')
    <div class="card-body">
        <h2 class="mb-4">Thông tin website</h2>

        <form action="{{ route('admin.site-settings.store') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label required">Mô tả ngắn website (Hiển thị chân trang)</label>
                    <input type="text" class="form-control" value="{{ config('settings.site_short_description') }}" name="site_short_description" placeholder="Nhập mô tả ngắn về sàn TMĐT...">
                    <x-input-error :messages="$errors->get('site_short_description')" class="mt-2" />
                </div>
                <div class="col-md-12">
                    <label class="form-label required">Địa chỉ trụ sở</label>
                    <input type="text" class="form-control" value="{{ config('settings.site_address') }}" name="site_address" placeholder="VD: Số 1 Đại Cồ Việt, Hai Bà Trưng, Hà Nội">
                    <x-input-error :messages="$errors->get('site_address')" class="mt-2" />
                </div>

                <div class="col-md-12">
                    <label class="form-label required">Giờ làm việc / Hỗ trợ khách hàng</label>
                    <input type="text" class="form-control" value="{{ config('settings.site_hours') }}" name="site_hours" placeholder="VD: Thứ 2 - Thứ 7: 8:00 - 18:00">
                    <x-input-error :messages="$errors->get('site_hours')" class="mt-2" />
                </div>

                <div class="col-md-12">
                    <label class="form-label required">Bản quyền (Copyright text)</label>
                    <input type="text" class="form-control" value="{{ config('settings.site_copyright') }}" name="site_copyright" placeholder="VD: © 2026 ShopX. Tất cả các quyền được bảo lưu.">
                    <x-input-error :messages="$errors->get('site_copyright')" class="mt-2" />
                </div>

            </div>
            <div class="btn-list justify-content-end mt-5">
                <button type="submit" class="btn btn-primary btn-2">Lưu thông tin</button>
            </div>
        </form>

    </div>
@endsection
