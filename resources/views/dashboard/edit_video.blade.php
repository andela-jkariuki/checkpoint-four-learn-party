@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 card">

        @include('layouts.dashboard._user_side_nav')

    </div>
    <div class="col-md-5 col-md-offsets-1">
        <h3>Update {{ link_to_route('show_video', $title = $video->title, $parameters = ['id' => $video->id], $attributes = []) }}</h3>

        @include('errors.feedback')

        {!! Form::model($video, [
                'method' => 'PUT',
                'action' => [
                    'DashboardController@update',
                    'id' => $video->id
                ], 'class' => 'form'
            ])
         !!}
            @include('layouts.dashboard._video_form', ['submitButtonText' => 'Updated Video Post', 'submitButtonId' => 'edit-video'])
        {!! Form::close() !!}
    </div>
</div>
@endsection