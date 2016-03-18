@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1 style="font-size:10em;">404</h1>
        <h2>You have upset the balance of the internet. Go back to the <a href="{{ route('homepage') }}">Learn Party Mothership</a></h2>
        <img src="{{ URL::asset('images/404.jpg') }}">
    </div>
@endsection