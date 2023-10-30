@extends('layouts.dashboardmaster')
@section('content')
    <div class="page-body">
        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5 class="card-title fw-bolder">Category Information</h5>
                                    </div>
                                    @if (session('success'))
                                        <p
                                            style="background-color: #4caf4fb3; color: white; padding: 10px; border: 2px solid ##4caf4fb3; border-radius: 4px; text-align: left;">
                                            {{ session('success') }}
                                        </p>
                                    @endif
                                    {{-- @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>
                                                    {{ error }}
                                                </li>
                                            @endforeach
                                        </div>
                                    @endif --}}
                                    <form class="theme-formtheme-form-2mega-form" method="POST"
                                        action="{{ url('category/insert') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Name<span
                                                    class="text-danger">
                                                    *</span> </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Category Name"
                                                    name="name" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Description <span
                                                    class="text-danger">
                                                    *</span> </label>
                                            <div class="col-sm-9">
                                                <textarea placeholder="Category Description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Thumbnail</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="category_thumbnail">
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
