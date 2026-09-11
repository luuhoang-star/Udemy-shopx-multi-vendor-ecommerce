@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card mb-4">
            <div class="card-body">
                <div class="accordion accordion-tabs" id="accordion-tabs">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-1-tabs" aria-expanded="true">
                                Gửi bản tin Email (Newsletter)
                                <div class="accordion-button-toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                        <path d="M6 9l6 6l6 -6"></path>
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div id="collapse-1-tabs" class="accordion-collapse collapse show" data-bs-parent="#accordion-tabs">
                            <div class="accordion-body">
                               <form action="{{ route('admin.newsletter.send') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="subject" class="form-label required">Tiêu đề bản tin</label>
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Nhập tiêu đề email...">
                                    <x-input-error for="subject" class="mt-2" :messages="$errors->get('subject')" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="message" class="form-label required">Nội dung bản tin</label>
                                    <textarea name="message" id="editor" class="form-control" placeholder="Nội dung email..."></textarea>
                                    <x-input-error for="message" class="mt-2" :messages="$errors->get('message')" />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Gửi bản tin ngay</button>
                                </div>
                               </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách đăng ký nhận tin (Subscribers)</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="order_table table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Email đăng ký</th>
                                <th>Trạng thái</th>
                                <th>Ngày đăng ký</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $subscriber->email }}</td>
                                    <td>
                                        @if ($subscriber->is_verified)
                                            <span class="badge bg-success-lt">Đã xác thực</span>
                                        @else
                                            <span class="badge bg-danger-lt">Chưa xác thực</span>
                                        @endif
                                    </td>
                                    <td class="text-muted">{{ date('d/m/Y H:i', strtotime($subscriber->created_at)) ?? 'N/A' }}</td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Chưa có người đăng ký nhận tin nào</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $subscribers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
