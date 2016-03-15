<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\Video;

class VideoController extends Controller
{
    public function show($id)
    {
        $video = Video::findOrFail($id);
        $url = substr(parse_url($video->url)['query'], 2);
        $video['video_link'] = $url;

        $categories = $video->categories;

        return view('video.video', compact('video', 'categories'));
    }
}
