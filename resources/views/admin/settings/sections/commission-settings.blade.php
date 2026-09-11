@extends('admin.settings.index')

@section('settings_contents')
    <div class="card-body">
        <h2 class="mb-4">Cài đặt hoa hồng</h2>

        <form action="{{ route('admin.commission-settings.store') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label required">Tỷ lệ hoa hồng Admin trên mỗi đơn hàng (%)</label>
                    <input type="number" step="0.01" class="form-control" value="{{ config('settings.admin_commission') }}" name="admin_commission" placeholder="VD: 5">
                    <small class="form-hint text-muted mt-2">Khoản hoa hồng sàn sẽ tự động khấu trừ từ doanh thu của người bán cho mỗi đơn hàng thành công.</small>
                    <x-input-error :messages="$errors->get('admin_commission')" class="mt-2" />
                </div>

            </div>
            <div class="btn-list justify-content-end mt-5">
                <button type="submit" class="btn btn-primary btn-2">Lưu cài đặt</button>
            </div>
        </form>

    </div>
@endsection
