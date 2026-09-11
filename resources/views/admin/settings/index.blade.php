@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                <div class="col-12 col-md-3 border-end">
                    <div class="card-body">
                        <h4 class="subheader">Cài đặt hệ thống</h4>
                        <div class="list-group list-group-transparent">
                            <a href="{{ route('admin.settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">Cài đặt chung</a>

                            <a href="{{ route('admin.commission-settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center {{ request()->routeIs('admin.commission-settings.index') ? 'active' : '' }}">Cài đặt hoa hồng</a>
                            <a href="{{ route('admin.logo-settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center {{ request()->routeIs('admin.logo-settings.index') ? 'active' : '' }}">Logo & Favicon</a>
                            <a href="{{ route('admin.site-settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center {{ request()->routeIs('admin.site-settings.index') ? 'active' : '' }}">Thông tin website</a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-9 d-flex flex-column">
                    @yield('settings_contents')
                </div>
            </div>
        </div>
    </div>
@endsection
