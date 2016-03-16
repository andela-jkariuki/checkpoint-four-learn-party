@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h2>{{ $video->title }}</h2>
            <iframe width="100%" height="500" src="http://www.youtube.com/embed/{{ $video->video_link }}" allowfullscreen></iframe>
        </div>
        <div class="col-md-12">
            <div id="video-info" class="well">
                <ul class="stats-summary pull-left">
                    <li>
                        <i class="fa fa-comment"></i> <span id="commentsCount">{{ $comments->count() }}</span>
                    </li>
                    <li>
                        <a id="favorite_video" href="#">
                            <i class="fa fa-heart{{ $likesVideo ? ' likesVideo': '' }}"></i>
                            <span class="favorites-count">{{ $favorites->count() }}</span>
                        </a>
                    </li>
                    <li>
                        <i class="fa fa-eye"></i> {{ $video->views + 1 }}
                    </li>
                </ul>
                <span class="pull-right">By <a href="#"> {{ $user->name }}</span></a>
            </div>
        </div>
        <div class="col-md-3">
            <div id="video-tags" class="well">
                @foreach ($categories as $category)

                    <span class="badge"><a href="#">{{ $category->name }}</a></span>

                @endforeach

            </div>
        </div>
        <div class="col-md-9">
            <div id="video-description" class="well">
                <p>{{ $video->description }}</p>
            </div>
        </div>
        <div class="col-md-12">

            @include('layouts.video._comments')

        </div>
    </div>
@endsection