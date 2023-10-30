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
                                        <h5>Updating Now: {{ $category->name }}</h5>
                                    </div>
                                    @if (session('success'))
                                        <p
                                            style="background-color: #4caf4fb3; color: white; padding: 10px; border: 2px solid ##4caf4fb3; border-radius: 4px; text-align: left;">
                                            {{ session('success') }}
                                        </p>
                                    @endif
                                    <form action="{{ url('category/edit') }}/{{ $category->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Category Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $category->name }}" placeholder="Category Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Category Description</label>
                                            <textarea class="form-control" name="description" rows="6" placeholder="Category Description">{{ $category->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="thumbnail" class="form-label">Current Category Thumbnail:</label>

                                            <div>
                                                <img width="80"
                                                    src="{{ asset('uploads/category_thumbnail') }}/{{ $category->category_thumbnail }}"
                                                    alt="notFound" />
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="thumbnail" class="form-label">New Category Thumbnail</label>
                                            <div>
                                                <input class="form-control" type="file" name="category_thumbnail">
                                            </div>
                                        </div>
                                        <button type="submit" value="Submit"
                                            style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                                            Update Category
                                        </button>
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
