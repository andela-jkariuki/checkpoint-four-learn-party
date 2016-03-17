@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Videos By Category</h3>
                    </div>
                    <div class="panel-body popular-videos">
                        <span class="badge"><a href="#">All</a></span>
                        <span class="badge"><a href="#">javascript</a></span>
                        <span class="badge"><a href="#">php</a></span>
                        <span class="badge"><a href="#">java</a></span>
                        <span class="badge"><a href="#">python</a></span>
                        <span class="badge"><a href="#">ruby</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Popular - Most Viewed</h3>
                    </div>
                    <div class="panel-body popular-videos">
                        <h5 class="top-videos"><i class="fa fa-youtube-play"></i> <a href="#">A very cool ass title</a></h5>
                        <h5 class="top-videos"><i class="fa fa-youtube-play"></i> <a href="#">A very cool ass title</a></h5>
                        <h5 class="top-videos"><i class="fa fa-youtube-play"></i> <a href="#">A very cool ass title</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Popular - Most Liked</h3>
                    </div>
                    <div class="panel-body popular-videos">
                        <h5 class="top-videos"><i class="fa fa-youtube-play"></i> <a href="#">A very cool ass title</a></h5>
                        <h5 class="top-videos"><i class="fa fa-youtube-play"></i> <a href="#">A very cool ass title</a></h5>
                        <h5 class="top-videos"><i class="fa fa-youtube-play"></i> <a href="#">A very cool ass title</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Popular - Most commented on</h3>
                    </div>
                    <div class="panel-body popular-videos">
                        <h5 class="top-videos"><i class="fa fa-youtube-play"></i> <a href="#">A very cool ass title</a></h5>
                        <h5 class="top-videos"><i class="fa fa-youtube-play"></i> <a href="#">A very cool ass title</a></h5>
                        <h5 class="top-videos"><i class="fa fa-youtube-play"></i> <a href="#">A very cool ass title</a></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div id="video-library">

            @if($videos->count() > 0)

                @foreach($videos->chunk(3) as $chunk)

                    <div class="row">
                    @foreach($chunk as $video)

                        @include ('layouts._video')

                    @endforeach

                    </div>
                @endforeach

                {!! $videos->links() !!}
            @else
                <div class="well well-lg">
                    <i class="fa fa-info-circle"></i> There are no videos to display. PLease check again later.
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
