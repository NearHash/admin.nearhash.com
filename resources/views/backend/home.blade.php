@extends('backend.layouts.app')

@section('title', 'Near Hash')

@section('content')

<div class="row g-3">
    <div class="col-lg-6 col-xl-4">
        <div class="info-box p-3">
            <span class="icon-container"><i class="fa-solid fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text dashboard_box_text mb-2">Total Users</span>
                <span class="info-box-number dashboard_box_text-small">24K</span>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-xl-4">
        <div class="info-box p-3">
            <span class="icon-container"><i class="fa-solid fa-signs-post"></i></span>
            <div class="info-box-content">
                <span class="info-box-text dashboard_box_text mb-2">Total Posts</span>
                <span class="info-box-number dashboard_box_text-small">50K</span>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-xl-4">
        <div class="info-box p-3">
            <span class="icon-container"><i class="fa-solid fa-signs-post"></i></span>
            <div class="info-box-content">
                <span class="info-box-text dashboard_box_text mb-2">Today Posts</span>
                <span class="info-box-number dashboard_box_text-small">840</span>
            </div>
        </div>
    </div>
</div>

@endsection