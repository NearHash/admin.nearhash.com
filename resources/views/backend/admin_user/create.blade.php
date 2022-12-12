@extends('backend.layouts.app')
@section('title', 'Admin Users')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('css/admin_user/create.css')}}">
@endsection
@section('content')

<h3>Admin Users Create Form</h3>

<div class="card border-0 p-3 mt-3">
    <div class="row">
        <div class="col-lg-10 col-xl-8">
            <form action="" class="content-fm" >
                <div class="form-group mb-3">
                    <label for="" class="form-label">Profile</label>
                    <input type="file" name="profile" class="form-input form-control content-fm" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-input form-control content-fm" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Name ID</label>
                    <input type="text" name="name_id" class="form-input form-control content-fm" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-input form-control content-fm" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-input form-control content-fm" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Date of birth</label>
                    <input type="text" name="date_of_birth" class="form-input form-control content-fm" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Gender</label>
                    <input type="text" name="phone" class="form-input form-control content-fm" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Address</label>
                    <input type="text" name="address" class="form-input form-control content-fm" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-input form-control content-fm" autocomplete="off">
                </div>
                <div>
                    <button type="submit" class="red-btn me-3">Confirm</button>
                    <button class="red-btn bg-secondary back-btn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection