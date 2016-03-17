            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Videos By Category</h3>
                    </div>
                    <div class="panel-body popular-videos">
                        <span class="badge"><a href="{{ route('homepage') }}">All</a></span>

                        @foreach($categories as $category)

                            <span class="badge">
                                <a href="{{ route ('show_category', ['category' => $category->name]) }}">{{ $category->name }}</a>
                            </span>

                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Popular - Most Viewed</h3>
                    </div>
                    <div class="panel-body popular-videos">
                        @foreach($topVideos['topViewed'] as $video)

                            <h5 class="top-videos">
                                <i class="fa fa-youtube-play"></i>
                                <a href="{{ route('show_video', ['id' => $video->id]) }}">{{ substr($video->title, 0, 25) }} {{ strlen($video->title) > 25 ? '...': ''}}</a>
                                <span class="incognito-text">({{ $video->views}})</span>
                            </h5>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Popular - Most Liked</h3>
                    </div>
                    <div class="panel-body popular-videos">
                        @foreach($topVideos['topFavorited'] as $video)

                            <h5 class="top-videos">
                                <i class="fa fa-youtube-play"></i>
                                <a href="{{ route('show_video', ['id' => $video->id]) }}">{{ substr($video->title, 0, 25) }} {{ strlen($video->title) > 25 ? '...': ''}}</a>
                                <span class="incognito-text">({{ $video->favorites}})</span>
                            </h5>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Popular - Most commented on</h3>
                    </div>
                    <div class="panel-body popular-videos">
                        @foreach($topVideos['topCommentedOn'] as $video)

                            <h5 class="top-videos">
                                <i class="fa fa-youtube-play"></i>
                                <a href="{{ route('show_video', ['id' => $video->id]) }}">{{ substr($video->title, 0, 25) }} {{ strlen($video->title) > 25 ? '...': ''}}</a>
                                <span class="incognito-text">({{ $video->comments}})</span>
                            </h5>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Top video publishers</h3>
                    </div>
                    <div class="panel-body popular-videos">

                        @foreach($topVideos['topUsers'] as $user)

                            @if ($user->videos !== 0)

                                <span class="badge">
                                    <a href="{{ route ('show_user', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                    <span class="incognito-text">({{ $user->videos }})</span>
                                </span>

                            @endif
                        @endforeach

                    </div>
                </div>
            </div>