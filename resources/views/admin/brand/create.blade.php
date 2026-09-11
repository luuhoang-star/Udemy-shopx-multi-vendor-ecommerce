@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm mới thương hiệu</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data" class="brand-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="mb-2 form-label">Logo thương hiệu</label>
                                <x-input-image imageUploadId="image-upload" imagePreviewId="image-preview"
                                    imageLabelId="image-label" name="brand_logo" />
                                <x-input-error :messages="$errors->get('brand_logo')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tên thương hiệu</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên thương hiệu" value="">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-check form-switch form-switch-3">
                                    <input class="form-check-input" type="checkbox" checked="" name="status"
                                        id="status">
                                    <span class="form-check-label">Kích hoạt</span>
                                </label>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.brand-form').submit()">Tạo mới</button>
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
                label_selected: "Đổi ảnh khác",
                no_label: false
            });
        });
    </script>
@endpush
