@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Banner trang chủ (Hero Banners)</h3>
                <div class="card-actions">
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hero-banners.store') }}" method="POST" class="coupon-form" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-primary">Banner 1 (Trên)</h3>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Hình ảnh Banner 1</label>
                                <x-input-image imageUploadId="image-upload" imagePreviewId="image-preview"
                                    imageLabelId="image-label" name="banner_one" :image="asset($heroBanner?->banner_one)" />
                                <x-input-error :messages="$errors->get('banner_one')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tiêu đề Banner 1</label>
                                <input type="text" class="form-control" name="title_one" placeholder="VD: Bộ sưu tập mùa hè" value="{{ $heroBanner?->title_one }}">
                                <x-input-error :messages="$errors->get('title_one')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Đường dẫn liên kết 1 (URL)</label>
                                <input type="text" class="form-control" name="btn_url_one" placeholder="https://..." value="{{ $heroBanner?->btn_url_one }}">
                                <x-input-error :messages="$errors->get('btn_url_one')" class="mt-2" />
                            </div>
                        </div>

                    </div>

                    <h3 class="text-primary mt-4">Banner 2 (Dưới)</h3>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Hình ảnh Banner 2</label>
                                <x-input-image imageUploadId="image-upload-two" imagePreviewId="image-preview-two"
                                    imageLabelId="image-label-two" name="banner_two" :image="asset($heroBanner?->banner_two)" />
                                <x-input-error :messages="$errors->get('banner_two')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tiêu đề Banner 2</label>
                                <input type="text" class="form-control" name="title_two" placeholder="VD: Giảm giá đặc biệt" value="{{ $heroBanner?->title_two }}">
                                <x-input-error :messages="$errors->get('title_two')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Đường dẫn liên kết 2 (URL)</label>
                                <input type="text" class="form-control" name="btn_url_two" placeholder="https://..." value="{{ $heroBanner?->btn_url_two }}">
                                <x-input-error :messages="$errors->get('btn_url_two')" class="mt-2" />
                            </div>
                        </div>

                    </div>


                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.coupon-form').submit()">Cập nhật Banner</button>
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
            $.uploadPreview({
                input_field: "#image-upload-two",
                preview_box: "#image-preview-two",
                label_field: "#image-label-two",
                label_default: "Chọn ảnh",
                label_selected: "Thay đổi ảnh",
                no_label: false
            });
        });
    </script>
@endpush
