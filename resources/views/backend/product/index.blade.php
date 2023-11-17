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
                                <h5>All Products</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('product.create') }}" class="align-items-center btn btn-theme">
                                        <i data-feather="plus-square"></i>
                                        Add New Product
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive product-table">
                                <table class="table all-package theme-table" id="product_table">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Category Name</th>
                                            <th>Product Thumbnail</th>
                                            <th>Product Name</th>
                                            <th>Date</th>

                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ App\Models\Category::find($product->category_id)->name }}</td>

                                                <td>
                                                    <img class="w-25"
                                                        src="{{ asset('uploads/product_thumbnailzz') }}/{{ $product->product_thumbnail }}" alt="{{ $product->product_thumbnail }}">
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->discounted_price }}</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <button {{-- value="{{ url('category/delete') }}/{{ $category->id }}" --}}
                                                                class="btn btn-sm btn-danger category_delete_btn">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>

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

        @include('parts.copyright')
    </div>
    <!-- Container-fluid end -->
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function() {
            $("#product_table").DataTable();
            $('#product_table').on('click', '.product_delete_btn', function() {
                var link = $(this).val();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#3085d6',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        /* Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ) */
                        window.location.href = link;
                    }
                })
            });
        });
    </script>
@endsection
