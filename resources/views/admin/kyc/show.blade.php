@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Chi tiết yêu cầu KYC</h3>
                <div class="card-actions">
                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-2">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Quay lại
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <tbody>
                            <tr>
                                <td class="fw-bold" style="width: 25%;">Họ và tên</td>
                                <td>{{ $kyc_request->full_name }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Ngày sinh</td>
                                <td>{{ $kyc_request->date_of_birth }}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold">Giới tính</td>
                                <td>{{ $kyc_request->gender == 'male' ? 'Nam' : ($kyc_request->gender == 'female' ? 'Nữ' : $kyc_request->gender) }}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold">Địa chỉ đầy đủ</td>
                                <td>{{ $kyc_request->full_address }}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold">Loại giấy tờ</td>
                                <td>{{ strtoupper($kyc_request->document_type) }}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold">Bản scan giấy tờ</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.kyc.download', $kyc_request) }}">Tải xuống tài liệu</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="fw-bold">Trạng thái hiện tại</td>
                                @if ($kyc_request->status == 'pending')
                                    <td class="text-secondary"><span class="badge bg-warning-lt">Chờ duyệt</span></td>
                                @elseif($kyc_request->status == 'approved')
                                    <td class="text-secondary"><span class="badge bg-success-lt">Đã duyệt</span></td>
                                @else
                                    <td class="text-secondary"><span class="badge bg-danger-lt">Từ chối</span></td>
                                @endif
                            </tr>

                            <tr>
                                <td class="fw-bold">Thay đổi trạng thái</td>
                                <td>
                                   <form action="{{ route('admin.kyc.update', $kyc_request) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                     <div class="input-group" style="max-width: 350px;">
                                        <select name="status" class="form-control">
                                            <option @selected($kyc_request->status == 'pending') value="pending">Chờ duyệt (Pending)</option>
                                            <option @selected($kyc_request->status == 'approved') value="approved">Đã duyệt (Approved)</option>
                                            <option @selected($kyc_request->status == 'rejected') value="rejected">Từ chối (Rejected)</option>
                                        </select>
                                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                                    </div>
                                   </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
