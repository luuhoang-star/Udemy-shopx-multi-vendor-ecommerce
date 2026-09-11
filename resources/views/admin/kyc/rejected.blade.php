@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Yêu cầu KYC bị từ chối</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Trạng thái</th>
                                <th class="w-1">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kycRequests as $kycRequest)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $kycRequest->full_name }}</td>
                                    <td class="text-secondary">{{ $kycRequest->user->email ?? '' }}</td>
                                    <td class="text-secondary">{{ $kycRequest->date_of_birth }}</td>
                                    <td class="text-secondary">{{ $kycRequest->gender == 'male' ? 'Nam' : ($kycRequest->gender == 'female' ? 'Nữ' : $kycRequest->gender) }}</td>
                                    @if ($kycRequest->status == 'pending')
                                        <td class="text-secondary"><span class="badge bg-warning-lt">Chờ duyệt</span></td>
                                    @elseif($kycRequest->status == 'approved')
                                        <td class="text-secondary"><span class="badge bg-success-lt">Đã duyệt</span></td>
                                    @else
                                        <td class="text-secondary"><span class="badge bg-danger-lt">Từ chối</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.kyc.show', $kycRequest) }}" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Không có yêu cầu KYC nào bị từ chối</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $kycRequests->links() }}
                  </div>
            </div>
        </div>
    </div>
@endsection
