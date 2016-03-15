
<div class="row">
    <ul class="nav nav-tabs" role="tablist">
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
            <form action="#" method="post" class="form-horizontal" id="commentForm" role="form">
                <div class="form-group">
                    <label for="email" class="control-label">Comment</label>
                    <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                </div>
                <div class="form-group">
                      <button class="btn btn-success" type="submit" id="submitComment"><span class="fa fa-comment"></span> Summit comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
