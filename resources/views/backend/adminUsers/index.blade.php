@extends('backend.layouts.app')
@section('title', 'Admin Users')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('css/adminUsers/index.css')}}">
@endsection
@section('content')

<h3>Admin Users</h3>

<div class=""  style="margin: 34px 0 34px 0;">
    <a href="{{ route('admin.admin-users.create') }}" class="red-btn content-fm text-light"><i class="fas fa-plus"></i> Create Admin User</a>
</div>

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
                    <div class="content-fm mt-2">Yangon | Hledan Township</div>
                </div>
            </div>
        </div>

    </div>

    <nav aria-label="..." class="mt-3 d-flex justify-content-end">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
    </nav>

</div>

@endsection