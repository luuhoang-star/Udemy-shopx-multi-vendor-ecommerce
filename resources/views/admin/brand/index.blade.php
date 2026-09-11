@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thương hiệu sản phẩm</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">+ Thêm mới thương hiệu</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Logo</th>
                                <th>Tên thương hiệu</th>
                                <th>Trạng thái</th>
                                <th class="w-100px text-end">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img style="width: 50px" src="{{ asset($brand->image) }}" alt="">
                                    </td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if($brand->is_active == 1)
                                        <span class="badge bg-primary-lt">Hoạt động</span>
                                        @else
                                        <span class="badge bg-danger-lt">Tạm dừng</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item" href="{{ route('admin.brands.destroy', $brand) }}"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-secondary py-3">Chưa có thương hiệu nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
