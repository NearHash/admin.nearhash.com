@extends('backend.layouts.app')
@section('title', 'Users')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('css/user/index.css') }}">
@endsection
@section('content')

<h3>Users</h3>

<div class="card border-0 p-3 mt-3">
    <div class="row g-2 p-2">

        @foreach($users as $user)
            <div class="col-md-6 col-lg-4 col-xl-3  p-2">
                <div class="user-profile-card std-box-shadow">
                    <div class="profile-img-container">
                        <img src='{{asset("uploads/users/$user->id/".$user->images[0]->image)}}' alt="">
                    </div>
                    <div class="content p-3">
                        <div class="title-fm">{{$user->name}}</div>
                        <div class="content-fm mt-2 phone">
                            <span class="material-symbols-rounded icon">phone_iphone</span>
                            <span class="text ms-2">{{$user->phone}}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-end mt-3">
            {{$users->links()}}
        </div>
    </div>
</div>

@endsection
