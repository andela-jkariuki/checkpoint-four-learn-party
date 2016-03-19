<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\Video;
use LearnParty\Comment;
use LearnParty\User;

class VideoController extends Controller
{
    /**
     * Show a single video, comments, favorites, views and categories
     *
     * @param  Integer $id Video Id
     * @return View
     */
    public function show($id)
    {
        $video = $this->videoRepository->getVideo($id);

        $user = $video->user;
        $categories = $video->categories;
        $favorites = $video->favorites;

        $likesVideo = $this->videoRepository->getLikeStatus($video);

        $comments = $this->videoRepository->getAllComments($id);

        $this->videoRepository->updateViews($id);

        return view('video.video', compact('video', 'categories', 'comments', 'user', 'favorites', 'likesVideo'));
    }
}
