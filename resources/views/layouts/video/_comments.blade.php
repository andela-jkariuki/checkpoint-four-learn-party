
            <div class="row">
                <ul class="nav nav-tabs" role="tablist" id="comment-section">
                    <li class="active"><a href="#all-comments" role="tab" data-toggle="tab">Comments</a></li>

                    @if( Auth::user() )
                    <li><a href="#new-comment" role="tab" data-toggle="tab">Add comment</a></li>
                    @endif

                </ul>
                <div id="commentSection" class="tab-content">
                    <div class="tab-pane active" id="all-comments">
                        @if ($comments->count() > 0)

                            <ul class="media-list">

                            @foreach ($comments as $comment)

                                    <li class="media">
                                        <a class="media-left" href="#">
                                            <img class="media-object img-circle img-thumbnail" src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}" style="width:100px;">
                                        </a>
                                        <div class="media-body">
                                            <div class="well">
                                                <h4 class="media-heading">{{ $comment->user->name }}</h4>
                                                <h6 class="pull-right">{{ $comment->created_at->diffForHumans() }}</h6>
                                                <p class="media-comment">{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        @else

                            <div class="well well-lg">There are no comments on this video</div>

                        @endif

                    </div>
                    @if( Auth::user() )

                    <div class="tab-pane" id="new-comment">
                        <div id="feedback">
                            <div class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              Error. No comment provided or error processing request. Please try again.
                            </div>
                        </div>
                            {!! Form::open([
                                    'method' => 'POST',
                                    'action' => ['CommentController@create'],
                                    'class' => 'form'
                                ])
                            !!}

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                {!! Form::label('comment', 'Comment') !!}
                                {!! Form::textarea('comment', null, ['class' => 'form-control', 'id' => 'comment']) !!}
                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="button" id="newComment" class="btn btn-success">
                                    <i class="fa fa-btn comment"></i> Add comment
                                </button>
                            </div>

                        {!! Form::close() !!}

                    </div>

                    @endif

                </div>
            </div>

@if( Auth::user() )
@section('js')
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('#newComment').on("click", function ()
            {
                comment = $('#comment').val().trim();
                if (comment.length !== 0) {
                    addNewComment = $.ajax({
                        type : 'POST',
                        url: '{{ route("new_comment") }}',
                        data: {
                            comment:  comment,
                            video_id: {{ (int) $video->id }}
                        }
                    });

                    addNewComment.done(function (response) {
                        $('#feedback div').hide();
                        $('#comment').val('');
                        $("#comment-section li a:first").tab('show');
                        commentsCount = $('#commentsCount');
                        commentsCount.text(Number(commentsCount.text()) + 1);

                        newComment = '<li class="media">';
                        newComment += '<a class="media-left" href="#">';
                        newComment += '<img class="media-object img-circle img-thumbnail" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" style="width:100px;">';
                        newComment += '</a>';
                        newComment += '<div class="media-body">';
                        newComment += '<div class="well">';
                        newComment += '<h4 class="media-heading">{{ Auth::user()->name }}</h4>';
                        newComment += '<h6 class="pull-right">1 second ago </h6>';
                        newComment += '<p class="media-comment">' + comment + '</p>';
                        newComment += '</div>';
                        newComment += '</div>';
                        newComment += '</li>';

                        if ({{$comments->count() }} === 0) {
                            $('#all-comments').html('<ul class="media-list">' + newComment+ '</ul>');
                        } else{
                            $('#all-comments ul').append(newComment);
                        }
                    });

                    addNewComment.fail(function (response) {
                        $('#feedback div').show();
                    });
                } else{
                    $('#feedback div').show();
                }
            });

            $('#favorite_video').on('click', function (event) {
                event.preventDefault();
                $('#favorite_video').tooltip('destroy');

                    $('.fa-heart')
                    .removeClass('fa-heart')
                    .removeClass('likesVideo')
                    .addClass('fa-cog fa-spin');

                    newFavorite = $.ajax({
                        type : 'POST',
                        url: '{{ route("update_favorite") }}',
                        data: {
                            video_id: {{ (int) $video->id }}
                        }
                    });

                    newFavorite.done(function (response) {
                        if (response.message === 'favorited') {
                            $('.fa-cog')
                            .removeClass('fa-cog')
                            .removeClass('fa-spin')
                            .addClass('fa-heart likesVideo');

                            favoritesCount = $('.favorites-count');
                            favoritesCount.text(Number(favoritesCount.text()) + 1);
                        } else if (response.message === 'unfavorited') {
                            $('.fa-cog')
                            .removeClass('fa-cog')
                            .removeClass('fa-spin')
                            .addClass('fa-heart');

                            favoritesCount = $('.favorites-count');
                            favoritesCount.text(Number(favoritesCount.text()) - 1);
                        } else {
                            $('.fa-cog')
                            .removeClass('fa-cog')
                            .removeClass('fa-spin')
                            .addClass('fa-heart');

                            $('#favorite_video').tooltip('show');
                        }
                    });
            });
        });
      </script>
@endsection
@endif