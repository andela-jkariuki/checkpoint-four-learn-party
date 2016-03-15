<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\Video;

class VideoController extends Controller
{
    public function show($id)
    {
        return view('video.video');
    }
}
