@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 card">

        @include('layouts.dashboard._user_side_nav')

    </div>
    <div class="col-md-5 col-md-offsets-1">
        <h3>New Video Post</h3>

        @include('errors.feedback')

        {!! Form::open([
                'method' => 'POST',
                'action' => ['DashboardController@store'],
                'class' => 'form'
            ])
        !!}
            @include('layouts.dashboard._video_form', ['submitButtonText' => 'Add Video Post', 'submitButtonId' => 'new-video'])
        {!! Form::close() !!}
    </div>
</div>
@endsection