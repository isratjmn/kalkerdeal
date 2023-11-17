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
                                        <h5>Add New Product</h5>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-primary">
                                            {{ session('success') }}
                                        </div>
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
                                    <form class="theme-form theme-form-2 mega-form" method="POST"
                                        action="{{ route('product.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="category_id">
                                                    <option value="">---- Select One ----</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Product Name"
                                                    name="name" value="">
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 form-label-title">Purchase / Manufacturing Price</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="0" value=""
                                                    name="purchase_price">
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 form-label-title">Regular Price</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="0" value=""
                                                    name="regular_price">
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 form-label-title">Discount (%)</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" placeholder="Discount (%)"
                                                    value="" name="discount">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="form-label-title col-sm-3 mb-0">Short
                                                description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="2" name="short_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="form-label-title col-sm-3 mb-0">Long Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="4" name="long_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="form-label-title col-sm-3 mb-0">Long Description</label>
                                                    <div class="col-sm-9">
                                                        <div id="editor"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 mt-4 row">
                                            <label class="form-label-title col-sm-3 mb-0">Additional Info</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="additional_info" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="form-label-title col-sm-3 mb-0">Care Instruction</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="care_instruction" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-4 mt-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Product
                                                Thumbnail</label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-choose" type="file" id="formFile"
                                                    name="product_thumbnail">
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Product Featured
                                                Photo</label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-choose" type="file"
                                                    name="product_featured_photos[]" multiple>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 offset-sm-3 mt-4">
                                            <button type="submit" class="btn"
                                                style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                                                Add category
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Videos</h5>
                                    </div>
                                    <div class="row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">
                                            Video Link</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="Video Link">
                                        </div>
                                    </div>
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
