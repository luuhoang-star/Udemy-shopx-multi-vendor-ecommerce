@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật hồ sơ cá nhân</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <x-input-image imageUploadId="image-upload" imagePreviewId="image-preview" imageLabelId="image-label" name="avatar" :image="asset(auth('admin')->user()->avatar)" />
                                <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label required">Họ và tên</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên"
                                        value="{{ auth('admin')->user()->name }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label required">Địa chỉ Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ email"
                                        value="{{ auth('admin')->user()->email }}">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                </form>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">Đổi mật khẩu</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="row mt-30">

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Mật khẩu hiện tại</label>
                                <input type="password" class="form-control" name="current_password" placeholder="Nhập mật khẩu hiện tại">
                                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Mật khẩu mới</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu mới">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="submit"
                                value="Submit">Cập nhật mật khẩu</button>
                        </div>
                    </div>
                </form>
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
