@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Xóa dữ liệu Database (Wipe Database)</h3>
            </div>
            <div class="card-body p-4">
                <div class="alert alert-important alert-danger" role="alert">
                    <div class="alert-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon alert-icon icon-2">
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 8v4"></path>
                            <path d="M12 16h.01"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="alert-heading">Cảnh báo quan trọng :</h4>
                        <div class="alert-description">
                            <p>Hành động này sẽ xóa sạch dữ liệu người dùng, sản phẩm, đơn hàng,... trong cơ sở dữ liệu và thiết lập lại hệ thống. Vui lòng hết sức cẩn trọng!</p>
                            <div class="mt-3">
                                <a href="" class="btn btn-danger wipe-database">Xóa sạch dữ liệu Database</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.wipe-database').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Bạn có chắc chắn muốn xóa?",
                    text: "Toàn bộ dữ liệu hệ thống sẽ bị xóa và không thể khôi phục lại!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d63939",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Đồng ý, xóa sạch!",
                    cancelButtonText: "Hủy bỏ"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.database-clear') }}",
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(response) {
                                if (response.success) {
                                    notyf.success(response.message);
                                    location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                if (xhr.responseJSON.error) {
                                    notyf.error(xhr.responseJSON.message);
                                }
                            }
                        })
                    }
                });
            })
        })
    </script>
@endpush
