@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật trang tùy chỉnh</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.custom-pages.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.custom-pages.update', $custom_page) }}" method="POST" class="coupon-form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tiêu đề trang</label>
                                <input type="text" class="form-control" name="title" placeholder="VD: Chính sách bảo mật" value="{{ $custom_page->title }}">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Nội dung trang</label>
                                <textarea name="content" id="editor">{!! $custom_page->content !!}</textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-check form-switch form-switch-3">
                                    <input class="form-check-input" type="checkbox" @checked($custom_page->is_active) name="is_active"
                                        id="status" value="1">
                                    <span class="form-check-label">Kích hoạt</span>
                                </label>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.coupon-form').submit()">Cập nhật trang</button>
            </div>
        </div>
    </div>
@endsection
