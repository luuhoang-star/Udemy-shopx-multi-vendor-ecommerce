@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật thẻ sản phẩm</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tags.update', $tag) }}" method="POST" class="tag-form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tên thẻ</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên thẻ sản phẩm" value="{{ $tag->name }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-check form-switch form-switch-3">
                                    <input class="form-check-input" type="checkbox" @checked($tag->is_active) name="status"
                                        id="status">
                                    <span class="form-check-label">Kích hoạt</span>
                                </label>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.tag-form').submit()">Cập nhật</button>
            </div>
        </div>
    </div>
@endsection
