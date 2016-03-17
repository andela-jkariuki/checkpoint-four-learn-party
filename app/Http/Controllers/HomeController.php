<?php

namespace LearnParty\Http\Controllers;

use LearnParty\Http\Requests;
use Illuminate\Http\Request;
use LearnParty\Video;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest()->paginate(6);
        return view('homepage', compact('videos'));
    }
}
