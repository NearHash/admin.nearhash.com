@extends('backend.layouts.app')
@section('title', 'Users')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('css/users/index.css') }}">
@endsection
@section('content')

<h3>Users</h3>

<div class="card border-0 p-3 mt-3">
    <div class="row g-2 p-2">
        <div class="col-md-6 col-lg-4 col-xl-3  p-2">
            <div class="user-profile-card std-box-shadow">
                <div class="profile-img-container">
                    <img src="http://jaybabani.com/zestreact/appnew/images/social/socmembers/member-3.jpg" alt="">
                </div>
                <div class="content p-3">
                    <div class="title-fm">John Wick</div>
                    <div class="content-fm mt-2">Yangon | Hlaing Township</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3  p-2">
            <div class="user-profile-card std-box-shadow">
                <div class="profile-img-container">
                    <img src="http://jaybabani.com/zestreact/appnew/images/social/socmembers/member-15.jpg" alt="">
                </div>
                <div class="content p-3">
                    <div class="title-fm">Mary James</div>
                    <div class="content-fm mt-2">Yangon | Dagon Township</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3  p-2">
            <div class="user-profile-card std-box-shadow">
                <div class="profile-img-container">
                    <img src="http://jaybabani.com/zestreact/appnew/images/social/socmembers/member-1.jpg" alt="">
                </div>
                <div class="content p-3">
                    <div class="title-fm">Thanos</div>
                    <div class="content-fm mt-2">Yangon | Insein Township</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3  p-2">
            <div class="user-profile-card std-box-shadow">
                <div class="profile-img-container">
                    <img src="http://jaybabani.com/zestreact/appnew/images/social/socmembers/member-14.jpg" alt="">
                </div>
                <div class="content p-3">
                    <div class="title-fm">Dary</div>
                    <div class="content-fm mt-2">Yangon | Hlaing Township</div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 col-xl-3  p-2">
            <div class="user-profile-card std-box-shadow">
                <div class="profile-img-container">
                    <img src="http://jaybabani.com/zestreact/appnew/images/social/socmembers/member-16.jpg" alt="">
                </div>
                <div class="content p-3">
                    <div class="title-fm">Ms Marvel</div>
                    <div class="content-fm mt-2">Yangon | Hlaing Township</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3  p-2">
            <div class="user-profile-card std-box-shadow">
                <div class="profile-img-container">
                    <img src="http://jaybabani.com/zestreact/appnew/images/social/socmembers/member-4.jpg" alt="">
                </div>
                <div class="content p-3">
                    <div class="title-fm">Emilly</div>
                    <div class="content-fm mt-2">Yangon | Tharkayta Township</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3  p-2">
            <div class="user-profile-card std-box-shadow">
                <div class="profile-img-container">
                    <img src="http://jaybabani.com/zestreact/appnew/images/social/socmembers/member-12.jpg" alt="">
                </div>
                <div class="content p-3">
                    <div class="title-fm">Mary May</div>
                    <div class="content-fm mt-2">Yangon | Hlaing Township</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3  p-2">
            <div class="user-profile-card std-box-shadow">
                <div class="profile-img-container">
                    <img src="http://jaybabani.com/zestreact/appnew/images/social/socmembers/member-5.jpg" alt="">
                </div>
                <div class="content p-3">
                    <div class="title-fm">Peter Parker</div>
                    <div class="content-fm mt-2">Yangon | Hlandan Township</div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection