@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">

        @include('layouts.dashboard._user_side_nav')

    </div>
    <div id-"video-library" class="col-md-9">
        <h1>My Favorite videos</h1>
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
                        <span class="pull-right dashboard-float">
                            <a id="favorite_video" class="favorite_video" href="#" data-video-url="{{ $video->id }}">
                                <i class="fa fa-heart likesVideo"></i>
                                <span class="favorites-count incognito-text"> {{ $favorites[$video->id] }}</span>
                            </a>
                        </span>
                        <section class="video">
                            <div class="title">
                                <h4>
                                    <a href="{{ route('show_video', ['id' => $video->id]) }}">
                                    {{ substr($video->title, 0, 50) }}
                                    {{ strlen($video->title) > 50 ? '...': ''}}
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
                <i class="fa fa-info-circle"></i> You do not have any favorited videos.
            </div>
        @endif

        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $('.favorite_video').on('click', function (event) {
        var this_ = $(this);
        event.preventDefault();

        this_.find('i.fa-heart')
        .removeClass('fa-heart')
        .removeClass('likesVideo')
        .addClass('fa-cog fa-spin');

        newFavorite = $.ajax({
            type : 'POST',
            url: '{{ route("update_favorite") }}',
            data: {
                video_id: this_.attr('data-video-url')
            }
        });
        location.reload();
    });
</script>
@endsection