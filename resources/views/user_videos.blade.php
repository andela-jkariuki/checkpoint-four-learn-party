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
                            @if (!is_null($headline))
                                <h4>
                                    <a href="{{ route('show_video', ['id' => $headline->id]) }}">
                                        {{ substr($headline->title, 0, 100) }}
                                        {{ strlen($headline->title) > 100 ? '...': ''}}
                                    </a>
                                </h4>
                                <iframe width="100%" height="325" src="http://www.youtube.com/embed/{{ $videos[0]->url }}" allowfullscreen></iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <h3>Videos Posted by {{ $user->name }}</h3>
            <hr>
            <div id="video-library">

            @if($videos->count() > 0)

                @foreach($videos->chunk(3) as $chunk)

                    <div class="row">
                    @foreach($chunk as $video)

                        @include ('layouts..video.video_card')

                    @endforeach

                    </div>
                @endforeach

                {!! $videos->links() !!}
            @else

                <div class="well well-lg">
                    <i class="fa fa-info-circle"></i> There are no videos to display. Please check again later.
                </div>

            @endif
            </div>
        </div>
    </div>
</div>
@endsection
