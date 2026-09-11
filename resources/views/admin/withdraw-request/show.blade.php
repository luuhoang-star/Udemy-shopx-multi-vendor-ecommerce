@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Chi tiết yêu cầu rút tiền</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.withdraw-requests.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <tbody>
                            <tr>
                                <td class="fw-bold" style="width: 25%;">Cửa hàng yêu cầu</td>
                                <td class="fw-bold">{{ $withdraw_request->store?->name }}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold">Số tiền rút</td>
                                <td class="fw-bold text-primary h3 mb-0">{{ config('settings.site_currency') }} {{ number_format($withdraw_request->amount, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Phương thức thanh toán</td>
                                <td><span class="badge bg-blue-lt">{{ $withdraw_request->payment_method }}</span></td>
                            </tr>

                            <tr>
                                <td class="fw-bold">Trạng thái hiện tại</td>
                                <td>
                                    @if ($withdraw_request->status == 'pending')
                                        <span class="badge bg-warning-lt">Chờ duyệt (Pending)</span>
                                    @elseif($withdraw_request->status == 'paid')
                                        <span class="badge bg-success-lt">Đã thanh toán (Paid)</span>
                                    @else
                                        <span class="badge bg-danger-lt">Từ chối (Rejected)</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Thông tin tài khoản nhận tiền</td>
                                <td>{!! $withdraw_request->payment_details !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                </div>
            </div>
        </div>

        @if($withdraw_request->status == 'pending')
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">Xử lý yêu cầu rút tiền</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.withdraw-requests.update', $withdraw_request) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-label">Cập nhật trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" @selected($withdraw_request->status == 'pending')>Chờ duyệt (Pending)</option>
                                <option value="paid" @selected($withdraw_request->status == 'paid')>Đã chuyển tiền (Paid)</option>
                                <option value="rejected" @selected($withdraw_request->status == 'rejected')>Từ chối yêu cầu (Rejected)</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-primary" type="submit">Lưu cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
