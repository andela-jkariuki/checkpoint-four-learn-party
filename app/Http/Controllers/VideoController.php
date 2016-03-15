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
        $video = Video::findOrFail($id);
        $video['video_link'] = substr(parse_url($video->url)['query'], 2);

        $categories = $video->categories;

        $comments = Comment::where('video_id', $id)->get();
        $comments = $comments->each(function ($comment, $key) {
            $comment['user'] = User::find($comment->user_id);
        });

        return view('video.video', compact('video', 'categories', 'comments'));
    }
}
