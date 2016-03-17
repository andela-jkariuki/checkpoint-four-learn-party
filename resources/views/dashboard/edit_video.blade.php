@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 card">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ url('/profile') }}">
                    {{ Auth::user()->name }}'{{ substr(Auth::user()->name, -1) == 's' ? '' : 's' }} profile
                </a>
            </li>
            <li class="list-group-item active">
                <a href="{{ route('create_video') }}">Add New video</a>
            </li>
            <li class="list-group-item">
                <a href="#">Uploaded videos</a>
            </li>
            <li class="list-group-item">
                <a href="#">Favorite Videos</a>
            </li
        </ul>
    </div>
    <div class="col-md-5 col-md-offsets-1">
        <h3>Updated {{ link_to_route('delete_video', $title = $video->title, $parameters = ['id' => $video->id], $attributes = []) }}</h3>

        @include('errors.feedback')

        {!! Form::model($video, [
                'method' => 'PUT',
                'action' => [
                    'DashboardController@update',
                    'id' => $video->id
                ], 'class' => 'form'
            ])
         !!}
            @include('layouts.dashboard._video_form', ['submitButtonText' => 'Updated Video Post'])
        {!! Form::close() !!}
    </div>
</div>
@endsection