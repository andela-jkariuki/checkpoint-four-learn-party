@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            @include('layouts.side_nav')

        </div>
        <div class="col-md-9">
            <div class="col-md-12" style="margin-bottom: 50px;">
                <div class="row">
                    <div id="user-profile">
                        <div class="col-md-4">
                            <h4>About <a href="{{ route('show_user', ['id' => $user->id]) }}"> {{ $user->name }}</a></h4>
                            <img src="{{ $user->avatar }}" style="height:250px;border-radius: 5px;">
                            <p>
                                {{ substr($user->about, 0, 100) }}
                                {{ strlen($user->about) > 100 ? '...': ''}}
                            </p>
                        </div>
                        <div class="col-md-8">

                        </div>
                    </div>
                </div>
            </div>
            <h3>Videos Posted by {{ $user->name }}</h3>
            <hr>
            <div id="video-library">



                <div class="well well-lg">
                    <i class="fa fa-info-circle"></i> There are no videos to display. Please check again later.
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
