@extends('layouts.frontendmaster')
@section('content')
    <h1>About Page</h1>
    <h3>My Friends List</h3>
    @foreach ($friends as $friend)
        <p>{{ $friend }}</p>
    @endforeach


    <h3>My Enemy List</h3>
    @foreach ($enemies as $enemy)
        <p>{{ $enemy }}</p>
    @endforeach
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo $i;
    } ?>

    @for ($i = 1; $i <= 10; $i++)
        {{ $i }}
    @endfor

    @if ($gender == 'Male')
        <h2>You are a Male</h2>
    @else
        <h2>You are a Female</h2>
    @endif
@endsection
