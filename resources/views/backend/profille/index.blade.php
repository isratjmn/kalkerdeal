@extends('layouts.dashboardmaster')
@section('content')
    <div class="page-body">
        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12 col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5 class="card-title fw-bolder">Change Password</h5>
                                    </div>
                                    @if (session('success'))
                                        <p
                                            style="background-color: #4caf4fb3; color: white; padding: 10px; border: 2px solid ##4caf4fb3; border-radius: 4px; text-align: left;">
                                            {{ session('success') }}
                                        </p>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-secondary">
                                            @foreach ($errors->all() as $error)
                                                <li>
                                                    {{ $error }}
                                                </li>
                                            @endforeach
                                        </div>
                                    @endif

                                    <form class="theme-formtheme-form-2mega-form" method="POST"
                                        action="{{ route('change.password') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Current Password<span
                                                    class="text-danger">
                                                    *</span> </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Current Password"
                                                    name="current_password">
                                                @error('current_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">New Password<span
                                                    class="text-danger">
                                                    *</span> </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="New Password"
                                                    name="password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Confirm Password<span
                                                    class="text-danger">
                                                    *</span> </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Confirm Password"
                                                    name="password_confirmation">
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn"
                                                style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                                                Change Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5 class="card-title fw-bolder">Category Information</h5>
                                    </div>

                                    @if (session('info_success'))
                                        <p
                                            style="background-color: #4caf4fb3; color: white; padding: 10px; border: 2px solid ##4caf4fb3; border-radius: 4px; text-align: left;">
                                            {{ session('info_success') }}
                                        </p>
                                    @endif

                                    <form class="theme-formtheme-form-2mega-form" method="POST"
                                        action="{{ route('change.information') }}" enctype="multipart/form-data">
                                        @csrf
                                        @if (auth()->user()->profile_photo)
                                            <div class="d-flex justify-content-center mx-auto text-center mb-4">
                                                <img width="90" height="90" class="user-profile rounded-circle"
                                                    src="{{ asset('uploads/avatar_photos') }}/{{ auth()->user()->profile_photo }}"
                                                    alt="img" />
                                            </div>
                                        @else
                                            <div class="d-flex justify-content-center mx-auto text-center mb-4">
                                                <img width="90" height="90" class="user-profile rounded-circle"
                                                    src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" />
                                            </div>
                                        @endif
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Profile Photo</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="profile_photo">
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"> Name<span class="text-danger">
                                                    *</span> </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Name" name="name"
                                                    value="{{ auth()->user()->name }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn"
                                                style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                                                Add category
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
        @include('parts.copyright')

    </div>
    <!-- Container-fluid End -->
@endsection
