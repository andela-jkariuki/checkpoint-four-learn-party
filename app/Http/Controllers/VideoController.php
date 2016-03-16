<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\Video;
use LearnParty\Comment;
use LearnParty\User;
use LearnParty\Http\Repositories\VideoRepository;

class VideoController extends Controller
{
    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * Show a single video, comments, favorites, views and categories
     *
     * @param  Integer $id Video Id
     * @return View
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        $video['video_link'] = $this->videoRepository->makeYoutubeUrl($video->url);

        $user = $video->user;
        $categories = $video->categories;
        $favorites = $video->favorites;

        $likesVideo = $this->videoRepository->getLikeStatus($video);

        $comments = $this->videoRepository->getAllComments($id);

        $this->videoRepository->updateViews($id);

        return view('video.video', compact('video', 'categories', 'comments', 'user', 'favorites', 'likesVideo'));
    }
}
