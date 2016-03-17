<?php

namespace LearnParty\Http\Controllers;

use LearnParty\Http\Repositories\VideoRepository;
use LearnParty\Http\Requests;
use Illuminate\Http\Request;
use LearnParty\Video;

class HomeController extends Controller
{
    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest()->paginate(12);
        $topVideos = $this->videoRepository->getTopPopularVideos(3);

        return view('homepage', compact('videos', 'topVideos'));
    }
}
