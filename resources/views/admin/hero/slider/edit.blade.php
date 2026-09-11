@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật Slider</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" class="coupon-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Hình ảnh Slider</label>
                                <x-input-image imageUploadId="image-upload" imagePreviewId="image-preview"
                                    imageLabelId="image-label" name="image" :image="asset($slider->image)" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tiêu đề</label>
                                <input type="text" class="form-control" name="title" placeholder="VD: Siêu giảm giá mùa hè" value="{{ $slider->title }}">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tiêu đề phụ</label>
                                <input type="text" class="form-control" name="sub_title" placeholder="VD: Giảm tới 50% cho tất cả đơn hàng" value="{{ $slider->sub_title }}">
                                <x-input-error :messages="$errors->get('sub_title')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Đường dẫn liên kết (Action URL)</label>
                                <input type="text" class="form-control" name="btn_url" placeholder="https://..." value="{{ $slider->btn_url }}">
                                <x-input-error :messages="$errors->get('btn_url')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-check form-switch form-switch-3">
                                    <input class="form-check-input" type="checkbox" @checked($slider->is_active) name="status"
                                        id="status">
                                    <span class="form-check-label">Kích hoạt</span>
                                </label>
                            </div>
                        </div>

                    </div>


                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.coupon-form').submit()">Cập nhật Slider</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "Chọn ảnh",
                label_selected: "Thay đổi ảnh",
                no_label: false
            });
        });
    </script>
@endpush
