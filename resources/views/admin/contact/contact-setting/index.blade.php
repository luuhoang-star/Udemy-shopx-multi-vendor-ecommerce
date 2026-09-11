@extends('admin.layouts.app')

@section('contents')

    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cài đặt thông tin trang liên hệ</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact-settings.store') }}" method="POST" class="tag-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Đường dẫn Google Map Embed (Iframe src)</label>
                                <input type="text" class="form-control" name="map_url" placeholder="https://www.google.com/maps/embed?..." value="{{ $section?->map_url }}">
                                <x-input-error :messages="$errors->get('map_url')" class="mt-2" />
                            </div>
                        </div>
                        <hr>


                        <div class="col-md-12">
                            <h4 class="text-primary mb-3">Văn phòng / Chi nhánh 1</h4>
                            <div class="mb-3">
                                <label class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" name="title_one" placeholder="VD: Trụ sở chính" value="{{ $section?->title_one }}">
                                <x-input-error :messages="$errors->get('title_one')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address_one" placeholder="Nhập địa chỉ chi nhánh 1" value="{{ $section?->address_one }}">
                                <x-input-error :messages="$errors->get('address_one')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email_one" placeholder="email@example.com" value="{{ $section?->email_one }}">
                                <x-input-error :messages="$errors->get('email_one')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone_one" placeholder="0123 456 789" value="{{ $section?->phone_one }}">
                                <x-input-error :messages="$errors->get('phone_one')" class="mt-2" />
                            </div>
                        </div>


                        <hr>

                        <div class="col-md-12">
                            <h4 class="text-primary mb-3">Văn phòng / Chi nhánh 2</h4>
                            <div class="mb-3">
                                <label class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" name="title_two" placeholder="VD: Chi nhánh miền Nam" value="{{ $section?->title_two }}">
                                <x-input-error :messages="$errors->get('title_two')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address_two" placeholder="Nhập địa chỉ chi nhánh 2" value="{{ $section?->address_two }}">
                                <x-input-error :messages="$errors->get('address_two')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email_two" placeholder="email@example.com" value="{{ $section?->email_two }}">
                                <x-input-error :messages="$errors->get('email_two')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone_two" placeholder="0123 456 789" value="{{ $section?->phone_two }}">
                                <x-input-error :messages="$errors->get('phone_two')" class="mt-2" />
                            </div>
                        </div>


                        <hr>
                        <div class="col-md-12">
                            <h4 class="text-primary mb-3">Văn phòng / Chi nhánh 3</h4>
                            <div class="mb-3">
                                <label class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" name="title_three" placeholder="VD: Trung tâm bảo hành" value="{{ $section?->title_three }}">
                                <x-input-error :messages="$errors->get('title_three')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address_three" placeholder="Nhập địa chỉ chi nhánh 3"
                                    value="{{ $section?->address_three }}">
                                <x-input-error :messages="$errors->get('address_three')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email_three" placeholder="email@example.com"
                                    value="{{ $section?->email_three }}">
                                <x-input-error :messages="$errors->get('email_three')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone_three" placeholder="0123 456 789"
                                    value="{{ $section?->phone_three }}">
                                <x-input-error :messages="$errors->get('phone_three')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.tag-form').submit()">Lưu cài đặt</button>
            </div>
        </div>
    </div>
@endsection
