@extends('backend.layouts.app')
@section('title', 'Users')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('css/user/index.css') }}">
@endsection
@section('content')


    <h3 class=" ms-4">Users Information</h3>

<div class=" border-0 p-3 mt-3">
    <div class="row g-2 p-2">

        @foreach($users as $user)
            <div class="col-md-6 col-lg-4 col-xl-3  p-2">
                <div class="user-profile-card std-box-shadow">
                    <div class="profile-img-container">
                        {{-- @dd($user->images[0]->image) --}}
                        <img src='{{asset("uploads/users/$user->id/".$user->images[0]->image)}}' alt="">
                        {{-- @foreach ($user->images as $image)
                            <img src='{{asset("uploads/users/$user->id/".$image->image)}}' alt="">
                        @endforeach --}}
                    </div>
                    <div class="content-actioin">
                        <div class="content p-1">
                            <div class="content-fm phone">
                                <span class="material-symbols-rounded icon me-3">account_circle</span>
                                <div class="title-fm">{{$user->name}}</div>
                            </div>
                            <div class="content-fm mt-1 phone">
                                <span class="material-symbols-rounded icon me-3">phone_iphone</span>
                                <span class="text">{{$user->phone}}</span>
                            </div>
                        </div>
                        <div class="action-btn content-fm">
                            <div class="d-flex">
                                <div class="p-1">
                                    <a href="{{ route('admin.user.detail', $user->id) }}" class="white-btn text-decoration-none text-light">Details</a>
                                </div>
                                <div class="p-1">
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="white-btn">Delete</button>
                                    </form>
                                </div>
                            </div>
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
