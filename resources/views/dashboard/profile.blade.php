@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 card">
        <ul class="list-group">
            <li class="list-group-item active">
                <a href="#">
                    {{ Auth::user()->name }}'{{ substr(Auth::user()->name, -1) == 's' ? '' : 's' }} profile
                </a>
            </li>
            <li class="list-group-item">
                <a href="#">Favorites</a>
            </li>
            <li class="list-group-item">
                <a href="#">Episodes</a>
            </li>
        </ul>
    </div>
    <div class="col-md-5 col-md-offsets-1">
        <h2>Update Profile</h2>
        {!! Form::model(Auth::user(), ['url' => 'profile/edit', 'method' => 'PUT', 'class' => 'form']) !!}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                {!! Form::label('username', 'Username') !!}
                {!! Form::text('username', null, ['class' => 'form-control']) !!}
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', 'E-Mail Address') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                {!! Form::label('about', 'About') !!}
                {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
                @if ($errors->has('about'))
                    <span class="help-block">
                        <strong>{{ $errors->first('about') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Update Profile
                </button>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-4">
        <h2>Profile Picture</h2>
        <img src="{{ Auth::user()->avatar }}" style="width:250px;height:250px">
        {!! Form::model(Auth::user(), ['url' => 'register', 'method' => 'POST', 'class' => 'form']) !!}
        {!! Form::file('image') !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection