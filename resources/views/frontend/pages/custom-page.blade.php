@extends('frontend.layouts.app')

@section('contents')
    <x-frontend.breadcrumb :items="[['label' => 'Trang chủ', 'url' => '/'], ['label' => $page->title]]" />

    <div class="page-content pt-70">
        <div class="container">
            <div class="row mb-50">
                <h1>{{ $page->title }}</h1>
                <div class="mt-20">{!! $page->content !!}</div>
            </div>
        </div>
    </div>
@endsection
