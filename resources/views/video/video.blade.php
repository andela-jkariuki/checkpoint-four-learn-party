@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h2>{{ $video->title }}</h2>
            <iframe width="100%" height="500" src="http://www.youtube.com/embed/{{ $video->url }}" allowfullscreen></iframe>
        </div>
        <div class="col-md-12">
            <div id="video-info" class="well">
                <ul class="stats-summary pull-left">
                    <li>
                        <i class="fa fa-comment"></i> <span id="commentsCount">{{ $comments->count() }}</span>
                    </li>
                    <li>
                        <a id="favorite_video" href="{{ Auth::user() ? '#': url('/login') }}">
                            <i class="fa fa-heart{{ $likesVideo ? ' likesVideo': '' }}"></i>
                            <span class="favorites-count">{{ $favorites->count() }}</span>
                        </a>
                    </li>
                    <li>
                        <i class="fa fa-eye"></i> {{ $video->views + 1 }}
                    </li>
                </ul>
                <div class="pull-right">
                @if (Auth::check() && Auth::user()->id == $video->user_id)
                    <a href="{{ route('edit_video', ['id' => $video->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('delete_video', ['id' => $video->id ]) }}" class="btn btn-danger btn-xs delete-video"><i class="fa fa-trash"></i></a>
                @else
                    Created by <a href="#"> {{ $user->name }}</a> <span class="incognito-text">{{ $video->created_at->diffForHumans() }}</span>
                @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div id="video-tags" class="well">
            @if($categories->count() > 0)
                @foreach ($categories as $category)

                    <span class="badge"><a href="#">{{ $category->name }}</a></span>

                @endforeach
            @else
                    <span class="badge">Uncategorized</span>
            @endif
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