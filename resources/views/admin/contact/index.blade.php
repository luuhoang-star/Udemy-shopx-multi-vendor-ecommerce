@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tin nhắn liên hệ</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Ngày gửi</th>
                                <th class="w-8">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $message->name }}</td>
                                    <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                                    <td class="fw-bold">{{ $message->subject }}</td>
                                    <td class="text-secondary">{{ truncate($message->message, 80) }}</td>
                                    <td class="text-muted">{{ date('d/m/Y H:i', strtotime($message->created_at)) }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-danger delete-item"
                                            href="{{ route('admin.contact-messages.destroy', $message) }}"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Không có tin nhắn nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
