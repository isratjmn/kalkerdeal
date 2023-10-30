<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | {{ env('APP_DESC') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a style="color: #fe5757;" class="navbar-brand fw-bolder" href="#">Kalker<strong
                    style="color: #000000;">Deal</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Reserve</a>
                    </li>
                </ul>
                <div class="ms-auto">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="d-flex nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fw-bold">Add Category</h4>
                        <p class="card-text">With this below Form you can Add Catogories.</p>
                    </div>
                    <div class="card-body">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="container mt-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session('success'))
                                            <p
                                                style="background-color: #4caf4fb3; color: white; padding: 10px; border: 2px solid ##4caf4fb3; border-radius: 4px; text-align: left;">
                                                {{ session('success') }}
                                            </p>
                                        @endif

                                        <form action="{{ url('category/insert') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" value="{{ old('name') }}"
                                                    placeholder="Enter Category Name">
                                                @error('name')
                                                    <span class="mt-2 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                    rows="4" placeholder="Enter Description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" value="Submit"
                                                style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                                                Add Category
                                            </button>
                                        </form>
                                        @if ($errors->any())
                                            <div class="alert alert-danger mt-3">
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fw-bold">List Category(Active)
                            <span class="badge bg-dark text-white">
                                {{ count($categories) }}
                            </span>
                        </h4>
                        <p class="card-text">With this below Form you can Add Categories.</p>
                    </div>
                    <div class="card-body">
                        @if (session('delete_success'))
                            <div class="alert alert-warning">
                                <strong>Done!!</strong>
                                {{ session('delete_success') }}
                            </div>
                        @endif
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL. No</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Category Description</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Last Updated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                                <td scope="row">
                                                    @if ($category->updated_at)
                                                        {{ $category->updated_at->diffForHumans() }}
                                                    @else
                                                        <span class="badge bg-danger">
                                                            Not Updated Yet
                                                        </span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic mixed styles example"
                                                        style="font-size: 10px;">
                                                        <a href="{{ url('category/delete') }}/{{ $category->id }}"
                                                            type="button" class="btn btn-danger"
                                                            style="font-size: 14px;">Delete </a>
                                                        <a href="{{ url('category/update') }}/{{ $category->id }}"
                                                            type="button" class="btn"
                                                            style="background-color: #517bcf; color: white; font-size: 14px;">Update</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                    </tbody>
                                </table>
                                <div class="alert fw-bold alert-danger text-center">
                                    No Category found
                                </div>
                                @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-4 col-12"></div>
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h4 class="card-title fw-bold text-white">List Category(Recycle Bin)
                            <span class="badge bg-light text-black">
                                {{ count($trash_categories) }}
                            </span>
                        </h4>
                        <p class="card-text text-white">With this below Form you can Add Catogories.</p>
                    </div>
                    <div class="card-body">
                        @if (session('restore_success'))
                            <div class="alert alert-success">
                                <strong>
                                    Done!!
                                </strong>
                                {{ session('restore_success') }}
                            </div>
                        @endif
                        <div class="btn-group mb-3" role="group" aria-label="Button group label">
                            <a href="{{ url('category/all/restore') }}" type="button" class="btn btn-secondary"
                                style="font-size: 16px; padding: 8px 20px;">Restore All</a>
                            <a href="{{ url('category/all/permanent/delete') }}" type="button" class="btn"
                                style="background-color: #fe5757; color: white; font-size: 16px; padding: 8px 20px;">Delete
                                All</a>
                        </div>
                        <div class="p-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">SL. No</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Description</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col"> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trash_categories as $trash_category)
                                        <tr>
                                            <td scope="row">{{ $loop->index + 1 }}</td>
                                            <td scope="row">{{ $trash_category->name }}</td>
                                            <td scope="row">{{ $trash_category->description }}</td>
                                            <td scope="row">{{ $trash_category->created_at->diffForHumans() }}</td>
                                            <td scope="row">
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example" style="font-size: 10px;">
                                                    <a href="{{ url('category/restore') }}/{{ $trash_category->id }}"
                                                        type="button" class="btn btn-secondary"
                                                        style="font-size: 12px;">Restore</a>
                                                    <a href="{{ url('category/permanent/delete') }}/{{ $trash_category->id }}"
                                                        type="button" class="btn"
                                                        style="background-color: #fe5757; color: white; font-size: 12px;">P.Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
