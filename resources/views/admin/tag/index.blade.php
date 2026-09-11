@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thẻ sản phẩm (Tags)</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">+ Thêm mới thẻ</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên thẻ</th>
                                <th>Trạng thái</th>
                                <th class="w-100px text-end">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        @if($tag->is_active == 1)
                                        <span class="badge bg-primary-lt">Hoạt động</span>
                                        @else
                                        <span class="badge bg-danger-lt">Tạm dừng</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-sm btn-outline-primary"><i class="ti ti-edit"></i></a>
                                        <a class="btn btn-sm btn-outline-danger delete-item" href="{{ route('admin.tags.destroy', $tag) }}"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-secondary py-3">Chưa có thẻ sản phẩm nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
