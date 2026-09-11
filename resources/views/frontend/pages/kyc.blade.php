@extends('frontend.layouts.app')

@section('contents')
    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Xác minh danh tính KYC']]" />

    <div class="page-content pt-150 pb-135">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 offset-lg-3">
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1 mb-4">
                                        <h4 class="mb-5">Xác minh danh tính (KYC)</h4>
                                    </div>
                                    <form method="post" action="{{ route('kyc.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="font-weight-bold">Họ và tên <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" required="" name="full_name"
                                                placeholder="VD: Nguyễn Văn A" />
                                            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                                        </div>


                                        <div class="form-group">
                                            <label for="" class="font-weight-bold">Ngày sinh <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" required="" name="date_of_birth"
                                                placeholder="1990/07/09" class="datepicker" />
                                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="font-weight-bold">Giới tính <span
                                                    class="text-danger">*</span></label>
                                            <select name="gender" id="" class="form-control">
                                                <option value="">-- Chọn giới tính --</option>
                                                <option value="male">Nam</option>
                                                <option value="female">Nữ</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="font-weight-bold">Địa chỉ thường trú <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" required="" name="full_address"
                                                placeholder="VD: Số 123 đường ABC, quận XYZ, TP. Hà Nội" />
                                            <x-input-error :messages="$errors->get('full_address')" class="mt-2" />
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="font-weight-bold">Loại giấy tờ <span
                                                    class="text-danger">*</span></label>
                                            <select name="document_type" id="" class="form-control">
                                                <option value="">-- Chọn loại giấy tờ --</option>
                                                <option value="id_card">Căn cước công dân / CMND</option>
                                                <option value="passport">Hộ chiếu (Passport)</option>
                                                <option value="driving_license">Giấy phép lái xe</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('document_type')" class="mt-2" />
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="font-weight-bold">Ảnh chụp / Scan giấy tờ <span
                                                    class="text-danger">*</span></label>

                                            <input type="file" required="" name="document_scan_copy" />
                                            <x-input-error :messages="$errors->get('document_scan_copy')" class="mt-2" />
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up"
                                                name="">Gửi hồ sơ xác minh</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
