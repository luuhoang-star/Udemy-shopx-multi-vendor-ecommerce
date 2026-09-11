@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật thông tin quản trị viên</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.role-users.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role-users.update', $admin) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Họ và tên</label>
                                <input type="text" class="form-control" name="name" placeholder="VD: Nguyễn Văn A" value="{{ $admin->name }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Địa chỉ Email</label>
                                <input type="text" class="form-control" name="email" placeholder="admin@example.com" value="{{ $admin->email }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu mới (Để trống nếu không đổi)</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới..." value="">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu mới..." value="">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Vai trò</label>
                                <select name="role" id="" class="form-control">
                                    <option value="">-- Chọn vai trò --</option>
                                    @foreach($roles as $role)
                                        @if($role->name == 'Super Admin') @continue @endif
                                        <option @selected(in_array($role->name, $admin->getRoleNames()->toArray())) value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('form').submit()">Cập nhật</button>
            </div>
        </div>
    </div>
@endsection
