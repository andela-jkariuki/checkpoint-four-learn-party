@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            @include('layouts.side_nav')

        </div>
        <div class="col-md-9">
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
                    <i class="fa fa-info-circle"></i> There are no videos to display. PLease check again later.
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
