@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 card">

        @include('layouts.dashboard._user_side_nav')

    </div>
    <div class="col-md-9">
        <h1>My Uploaded videos</h1>
        <hr>
        @include('errors.feedback')

        <div id="video-library">

        @if ($videos->count() > 0)
            @foreach($videos->chunk(3) as $chunk)

                <div class="row">
                @foreach($chunk as $video)

                    <div class="col-sm-4 col-md-4">
                        <a href="{{ route('show_video', ['id' => $video->id]) }}">
                            <img class="video-iframe" src="http://img.youtube.com/vi/{{ $video->url }}/0.jpg" allowfullscreen="">
                        </a>
                        <span class="pull-right">
                            <a id="favorite_video" class="favorite_video" href="#" data-video-url="{{ $video->id }}">
                                <a href="{{ route('edit_video', ['id' => $video->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete_video', ['id' => $video->id ]) }}" class="btn btn-danger btn-xs delete-video"><i class="fa fa-trash"></i></a>
                            </a>
                        </span>
                        <section class="video">
                            <div class="title">
                                <h4>
                                    <a href="{{ route('show_video', ['id' => $video->id]) }}">
                                    {{ substr($video->title, 0, 25) }}
                                    {{ strlen($video->title) > 25 ? '...': ''}}
                                    </a>
                                </h4>
                            </div>
                            <p>{{ substr($video->description, 0, 100) }}
                            {{ strlen($video->description) > 100 ? link_to_route('show_video', $title = '. . .', $parameters = ['id' => $video->id], $attributes = []): ''}}
                            </p>
                        </section>
                    </div>
                @endforeach

                </div>
            @endforeach

            {!! $videos->links() !!}
        @else
            <div class="well well-lg">
                <i class="fa fa-info-circle"></i> You do not have any uploaded videos.
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
