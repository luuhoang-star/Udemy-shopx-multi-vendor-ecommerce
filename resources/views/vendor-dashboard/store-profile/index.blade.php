@extends('vendor-dashboard.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật hồ sơ gian hàng</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('vendor.store-profile.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Logo gian hàng</label>
                                <x-input-image imageUploadId="image-upload" imagePreviewId="image-preview" imageLabelId="image-label" name="logo" :image="asset($store?->logo)" />
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Ảnh bìa gian hàng (Banner)</label>
                                <x-input-image imageUploadId="image-upload-two" imagePreviewId="image-preview-two" imageLabelId="image-label-two" name="banner" :image="asset($store?->banner)" />
                                <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tên gian hàng</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên gian hàng..." value="{{ $store?->name }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại liên hệ</label>
                                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại..." value="{{ $store?->phone }}">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label ">Email gian hàng</label>
                                <input type="text" class="form-control" name="email" placeholder="Nhập email..." value="{{ $store?->email }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ gian hàng</label>
                                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ..." value="{{ $store?->address }}">
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Mô tả ngắn</label>
                                <textarea name="short_description" class="form-control" placeholder="Nhập mô tả ngắn gọn về gian hàng...">{{ $store?->short_description }}</textarea>
                                <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Mô tả chi tiết</label>
                                <textarea name="long_description" id="editor" class="form-control">{{ $store?->long_description }}</textarea>
                                <x-input-error :messages="$errors->get('long_description')" class="mt-2" />
                            </div>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-primary">Lưu cập nhật</button>
                </form>
            </div>
        </div>


    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "Chọn tệp", // Default: Choose File
                label_selected: "Đổi tệp", // Default: Change File
                no_label: false // Default: false
            });
            $.uploadPreview({
                input_field: "#image-upload-two", // Default: .image-upload
                preview_box: "#image-preview-two", // Default: .image-preview
                label_field: "#image-label-two", // Default: .image-label
                label_default: "Chọn tệp", // Default: Choose File
                label_selected: "Đổi tệp", // Default: Change File
                no_label: false // Default: false
            });
        });
    </script>
@endpush
