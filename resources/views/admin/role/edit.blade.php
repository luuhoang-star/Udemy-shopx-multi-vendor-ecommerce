@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật vai trò</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.role.index') }}" class="btn btn-primary">Quay lại danh sách</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label required">Tên vai trò</label>
                            <input type="text" class="form-control" name="role" placeholder="VD: Quản lý đơn hàng"
                                value="{{ $role->name }}">
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        @foreach($permissions as $groupName => $permission)
                            <div class="col-md-4 mb-3">
                                <h4 class="text-primary border-bottom pb-2">{{ $groupName }}</h4>
                                @foreach($permission as $item)
                                    <label for="" class="form-check">
                                        <input @checked($role->hasPermissionTo($item->name)) type="checkbox" class="form-check-input" value="{{ $item->name }}" name="permissions[]">
                                        <span class="form-check-label">{{ $item->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('form').submit()">Cập nhật vai trò</button>
            </div>
        </div>
    </div>
@endsection
