@extends('layouts.dashboardmaster')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>All Users</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ url('user/create') }}" class="align-items-center btn btn-theme">
                                        <i data-feather="plus"></i>
                                        Add New Users
                                    </a>
                                </form>
                            </div>
                            <div class="table-responsive table-product">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>SL. No</th>
                                            <th>Profile Photo</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>Account Creation Date</th>
                                            <th>Role</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-left">
                                                    @if ($user->profile_photo)
                                                        <img width="40" height="40"
                                                            class="user-profile rounded-circle"
                                                            src="{{ asset('uploads/avatar_photos') }}/{{ $user->profile_photo }}" />
                                                    @else
                                                        <img width="40" class="user-profile rounded-circle"
                                                            src="{{ Avatar::create($user->name)->toBase64() }}" />
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="user-name">
                                                        <span>{{ $user->name }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="order-detail.html">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="javascript:void(0)">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalToggle">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- All User Table Ends-->
    @endsection
