@extends('backend.layouts.app')
@section('title', 'Users')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('css/user/detail.css') }}">
@endsection
@section('content')

<div class="row g-2">
    <div class="col-lg-4 p-2">
        <div class="user-information-card std-box-shadow">
            <div class="profile-images">
                <div class="user-background">
                    <img src="{{ asset('images/bc.jfif') }}" alt="">
                </div>
                <div class="user-profile">
                    <img src="{{ asset("uploads/users/$user->id/".$user->images[0]->image) }}" alt="">
                </div>
            </div>
            <div class="hover-change">
                <div class="text-center p-2">
                    <div class="content-fm">
                        {{ $user->name }}
                    </div>
                    <div class="content-fm mb-1">
                        I am web developer.
                    </div>
                    <div class="content-fm">
                        Yangon
                    </div>
                </div>
                <div class="divider my-3"></div>
                <div class="p-2">
                    <div class="row content-fm">
                        <div class="col-6 ">
                            <div>Email</div>
                            <div class="text-muted">{{ $user->email }}</div>
                        </div>
                        <div class="col-6">
                            <div>Location</div>
                            <div class="text-muted">Hledan | Yangon</div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <div>Phone</div>
                            <div class="text-muted">{{ $user->phone }}</div>
                        </div>
                        <div class="col-6">
                            <div>Name ID</div>
                            <div class="text-muted">{{ $user->name_id }}</div>
                        </div>
                    </div>
                </div>
                <div class="divider my-3"></div>
                <div class="p-2">
                    <div class="row content-fm">
                        <div class="col-4 p-2 d-flex justify-content-center">
                            <div class="icon me-2">
                                <span class="material-symbols-rounded">perm_media</span>
                            </div>
                            <div class="text-center">
                                <div>Posts</div>
                                <div>745</div>
                            </div>
                        </div>
                        <div class="col-4 p-2 d-flex justify-content-center">
                            <div class="icon me-2">
                                <span class="material-symbols-rounded">diversity_1</span>
                            </div>
                            <div class="text-center">
                                <div>Friends</div>
                                <div>589</div>
                            </div>
                        </div>
                        <div class="col-4 p-2 d-flex justify-content-center">
                            <div class="icon me-2">
                                <span class="material-symbols-rounded">forum</span>
                            </div>
                            <div class="text-center">
                                <div>Messages</div>
                                <div>1405</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-8 p-2">
        <div class="std-box-shadow p-3" style="border-radius: 8px">
            <div class="row g-2">
                @foreach ([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18] as $one)
                <div class="col-lg-4 content-fm p-2">
                    <a href="{{ route('admin.user.post', ['userID'=>3, 'postID'=>8]) }}" class="text-decoration-none">
                        <div class="post-card p-3 py-4 std-box-shadow ">
                            <p class="text-center ">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit...
                            </p>
                            <div class="d-flex justify-content-end text-muted date">
                                4 days ago
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}
</div>

@endsection
