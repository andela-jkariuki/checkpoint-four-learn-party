@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 card">

        @include('layouts.dashboard._user_side_nav')

    </div>
    <div class="col-md-5 col-md-offsets-1">
        <h2>Update Profile</h2>

        @include('errors.feedback')

        {!! Form::model(Auth::user(), [
            'method' => 'PUT',
            'action' => ['UserController@update'],
            'class' => 'form'
            ])
        !!}

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
                <button id="update-profile" type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Update Profile
                </button>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-4">
        <h2>Profile Picture</h2>
        <img src="{{ Auth::user()->avatar }}" style="width:250px;height:250px">
        {!! Form::model(Auth::user(), [
            'method' => 'PATCH',
            'action' => ['UserController@updateAvatar'],
            'class' => 'form uploadAvatar',
            'files' => true
            ])
        !!}

         <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
            {!! Form::file('avatar', [
                    'id' => 'avatar',
                    'style' => 'display:none',
                    'data-url' => '/profile/edit/avatar'
                ])
            !!}
            @if ($errors->has('avatar'))
                <span class="help-block">
                    <strong>{{ $errors->first('avatar') }}</strong>
                </span>
            @endif
        </div>
        {!! Form::close() !!}
        <a href="#" id="uploadAvatar" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Upload Avatar</a>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function()
        {
            $('#uploadAvatar').on('click', function (event)
            {
                event.preventDefault();
                $('#avatar').click();
            });

           $('#avatar').on("change", function ()
            {
                $('#uploadAvatar')
                    .removeClass('btn-success')
                    .addClass('btn-default')
                    .html('<i class="fa fa-spinner fa-spin"></i> Uploading avatar... ');

                $('.uploadAvatar').submit();
            });
        });
    </script>
@endsection