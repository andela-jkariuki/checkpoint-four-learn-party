@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if( Auth::guest())
                        Your Application's Landing Page.
                    @elseif(Auth::user())
                        You are logged in as {{Auth::user()->name}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
