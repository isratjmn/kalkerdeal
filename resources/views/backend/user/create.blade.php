@extends('layouts.dashboardmaster')
@section('content')
    <div class="page-body">
        <!-- New User start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Add New User</h5>
                                    </div>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button">Account</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <form class="theme-form theme-form-2 mega-form" method="POST"
                                                action="{{ url('user/insert') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-lg-2 col-md-3 mb-0">
                                                            Name<span class="text-danger fw-bold">*</span>
                                                        </label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="name"
                                                                placeholder="Name" value="{{ old('name') }}">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                            <span class="text-danger fw-bold">*</span></label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="email" name="email"
                                                                placeholder="Email Address" value="{{ old('email') }}">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mb-4
                                                                row align-items-center">
                                                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                            Profile Photo</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <style>
                                                                .hidden {
                                                                    visibility: hidden;
                                                                }
                                                            </style>
                                                            <input class="form-control" type="file" name="profile_photo"
                                                                onchange="showImage(this)">
                                                            <img class="mt-3 hidden" id="profile_photo_viewer"
                                                                src="#" alt="avatarImage" />
                                                            <script>
                                                                function showImage(input) {
                                                                    if (input.files && input.files[0]) {
                                                                        var reader = new FileReader();
                                                                        reader.onload = function(e) {
                                                                            $('#profile_photo_viewer').attr('src', e.target.result).width(100).height(100);
                                                                        };
                                                                        $('#profile_photo_viewer').removeClass('hidden');
                                                                        reader.readAsDataURL(input.files[0]);
                                                                    }
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Role<span
                                                                class="text-danger fw-bold">*</span></label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="role">
                                                                <option selected>--- Select Option ---</option>
                                                                <option class="pb-4" value="vendor">Vendor</option>
                                                                <option class="pb-4" value="admin">Admin</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 offset-sm-9 mt-4">
                                                        <button type="submit" value="Submit"
                                                            style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; width: 20%">
                                                            Add New User
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User End -->
@endsection
