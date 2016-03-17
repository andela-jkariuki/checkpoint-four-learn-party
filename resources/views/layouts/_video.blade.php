
                    <div class="col-sm-4 col-md-4">
                        <iframe class="video-iframe" src="http://www.youtube.com/embed/{{ $video->url }}" allowfullscreen=""></iframe>
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