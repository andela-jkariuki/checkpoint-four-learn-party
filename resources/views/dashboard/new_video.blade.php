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
                <a href="{{ url('/dashboard/create') }}">Add New video</a>
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
        <h2>Update Profile</h2>

        @include('errors.feedback')

        {!! Form::open(['url' => 'dashboard/create', 'method' => 'POST', 'class' => 'form']) !!}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Video Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                {!! Form::label('url', 'Youtube URL') !!}
                {!! Form::text('url', null, ['class' => 'form-control']) !!}
                @if ($errors->has('url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                {!! Form::label('category', 'Video Category') !!}
                {!! Form::text('category', null, ['class' => 'form-control']) !!}
                @if ($errors->has('category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                {!! Form::label('description', 'Video Description') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-youtube-play"></i> Post Video
                </button>
            </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection