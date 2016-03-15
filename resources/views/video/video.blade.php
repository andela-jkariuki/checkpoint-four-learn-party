@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h2>Video Name</h2>
            <iframe width="100%" height="500" src="http://www.youtube.com/embed/pLs4Tex0U1U"></iframe>
        </div>
        <div class="col-md-12">
            <div id="video-info" class="well">
                <ul class="stats-summary pull-left">
                    <li>
                        <a href="#"> <i class="fa fa-comment"></i> 1</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-heart"></i> 5</a>
                    </li>
                    <li>
                        <i class="fa fa-eye"></i> 101
                    </li>
                </ul>
                <span class="pull-right">By <a href="#">John Kariuki</span></a>
            </div>
        </div>
        <div class="col-md-3">
            <div id="video-tags" class="well">
                <span class="badge"><a href="#">php</a></span>
                <span class="badge"><a href="#">javascript</a></span>
                <span class="badge"><a href="#">python</a></span>
            </div>
        </div>
        <div class="col-md-9">
            <div id="video-description" class="well">
                Fusce pretium, massa sed placerat eleifend, justo magna finibus orci, eget pretium purus sem ac velit. Nunc cursus turpis eu consectetur bibendum. Maecenas fermentum dignissim feugiat. Sed risus ligula, dignissim nec aliquam at, interdum sed nulla. Morbi mollis nulla ac aliquam congue. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis auctor ex sapien. Vivamus nunc dui, semper eu ligula quis, vulputate elementum purus. Pellentesque malesuada id urna in lobortis. Morbi mollis mi laoreet mi aliquam, eu pretium quam sollicitudin.
            </div>
        </div>
        <div class="col-md-12">

            @include('layouts.video._comments');

        </div>
    </div>
@endsection