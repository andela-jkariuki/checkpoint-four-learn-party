@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 card">
            <h3>Log In, or <a href="{{ url('/register') }}">Sign Up</a></h3>
            <form role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <a class="pull-right" href="{{ url('/password/reset') }}">Forgot password?</a>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="checkbox pull-right">
                    <label><input id="remember" name="remember" type="checkbox">Remember me</label>
                </div>
                <button type="submit" class="btn btn btn-primary">Log In</button>
          </form>
          <div class="auth-or">
                <hr class="hr-or">
                <span class="span-or">OR</span>
          </div>
          <div class="row">
                <div class="col-xs-12 col-md-4">
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-md btn-primary btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="{{ url('/auth/twitter') }}" class="btn btn-md btn-block btn-social btn-twitter">
                        <i class="fa fa-twitter"></i> Twitter
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                  <a href="{{ url('/auth/github') }}" class="btn btn-md btn-block btn-social btn-github">
                        <i class="fa fa-github"></i> Github
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
