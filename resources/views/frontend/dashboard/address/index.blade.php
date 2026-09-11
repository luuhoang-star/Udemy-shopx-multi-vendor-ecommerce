@extends('frontend.dashboard.dashboard-app')

@section('dashboard_contents')
    <div class="tab-pane fade active show" id="address" role="tabpanel" aria-labelledby="address-tab">
        <div class="wsus__shipping_address mb_40">
            <h4>Sổ địa chỉ nhận hàng
                <a href="{{ route('address.create') }}" class="btn btn-primary">+ Thêm địa chỉ mới</a>
            </h4>

            <div class="row">
                @forelse ($addresses as $address)
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="wsus__shipping_address_item">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">{{ $address->address }}, {{ $address->city }}, {{ $address->state }}, {{ $address->zip }}, {{ $address->country }} </label>
                        </div>
                        <div class="wsus__shipping_mail_address">
                            <a href="javascript:;">{{ $address->email }}</a>
                            <a href="javascript:;">{{ $address->phone }}</a>
                            @if($address->is_default == 1)
                            <span class="text-success">(Mặc định)</span>
                            @endif
                        </div>
                        <ul class="btn_list">
                            <li>
                                <a href="{{ route('address.edit', $address) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('address.destroy', $address) }}" class="delete-item">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @empty
                    <h6 class="text-center py-5 text-muted">Bạn chưa lưu địa chỉ nào.</h6>
                @endforelse

            </div>

        </div>
    </div>
@endsection
