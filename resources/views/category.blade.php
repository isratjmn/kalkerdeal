@extends('layouts.frontendmaster')

@section('content')
    {{-- <h1>
        Caterogy( {{ count($categories) }})
    </h1> --}}
    <h1>
        Caterogy( {{ $categories->count() }})
    </h1>
    <table class="table table-striped table-responsive" border="1">
        <thead>
            <tr>
                <th style="width: 5%;">SL No.</th>
                <th style="width: 25%;">Category Name</th>
                <th style="width: 60%;">Category Desciption</th>
                <th style="width: 10%;">Created At</th>
                <th style="width: 10%;">Custom(DD/MM/YYYY)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td style="text-align: center;font-size: 22px; font-weight: 900">{{ $loop->index + 1 }}</td>
                    <td style="text-align: center;font-size: 22px; font-weight: 900">{{ Str::title($category->name) }}</td>
                    <td>{{ Str::lower($category->description) }}</td>
                    <td>{{ $category->created_at }}</td>
                    {{-- <td>
                        {{ $category->created_at->format('d F, Y') }}
                        <br>
                        {{ $category->created_at->format('h:m:s A') }}
                        <br>
                        {{ $category->created_at->diffForHumans()}}
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($categories as $category)
        <h3>{{ $category->name }}</h3>
        <p>{{ $category->description }}</p>
    @endforeach
@endsection
