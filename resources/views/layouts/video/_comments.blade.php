
<div class="row">
    <ul class="nav nav-tabs" role="tablist" id="comment-section">
        <li class="active"><a href="#all-comments" role="tab" data-toggle="tab">Comments</a></li>
        <li><a href="#new-comment" role="tab" data-toggle="tab">Add comment</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="all-comments">
            <ul class="media-list">
                <li class="media">
                    <a class="media-left" href="#">
                        <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
                    </a>
                    <div class="media-body">
                        <div class="well">
                            <h4 class="media-heading">Marco </h4>
                            <h6 class="pull-right">2 days ago</h6>
                            <p class="media-comment">
                                Great snippet! Thanks for sharing.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="media">
                    <a class="media-left" href="#">
                        <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/lady_katherine/128.jpg" alt="profile">
                    </a>
                    <div class="media-body">
                        <div class="well">
                            <h4 class="media-heading">Kriztine</h4>
                            <h6 class="pull-right">3 hours ago </h6>
                            <p class="media-comment">
                                Yehhhh... Thanks for sharing.
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
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
    </div>
</div>

@section('js')
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('#newComment').on("click", function ()
            {
                if ($('#comment').val().trim().length !== 0) {
                    $addNewComment = $.ajax({
                        type : 'POST',
                        url: '{{ route("new_comment") }}',
                        data: {
                            comment:  $('#comment').val().trim(),
                            video_id: {{ (int) $video->id }}
                        }
                    });

                    $addNewComment.done(function (response) {
                        $('#feedback div').hide();
                        $("#comment-section li a:first").tab('show');
                    });

                    $addNewComment.fail(function (response) {
                        $('#feedback div').show();
                    });
                } else{
                    $('#feedback div').show();
                }
            });
        });
      </script>
    <!-- @if ($errors->has('comment'))
            $('#comment-section li a:last').tab('show');
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    @endif -->
@endsection