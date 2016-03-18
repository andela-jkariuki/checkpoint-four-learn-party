
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ url('/profile') }}">
                    {{ Auth::user()->name }}'{{ substr(Auth::user()->name, -1) == 's' ? '' : 's' }} profile
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('create_video') }}">Add New video</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('video_uploads') }}">My Uploaded videos</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('video_favorites') }}">My Favorited Videos</a>
            </li>
        </ul>