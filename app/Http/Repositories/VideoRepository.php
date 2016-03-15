<?php

namespace LearnParty\Http\Repositories;

use LearnParty\Video;
use LearnParty\Comment;
use Auth;

class VideoRepository
{
    /**
     * Update the number of views by one everytime a video is viewed
     *
     * @param  Integer $id video Id
     * @return voi
     */
    public function updateViews($id)
    {
        Video::find($id)->increment('views');
    }

    /**
     * Return all comments as well as the respective users
     *
     * @param  integer $videoId Video Id
     * @return Object           Comments collection
     */
    public function getAllComments($videoId)
    {
        return Comment::where('video_id', $videoId)->latest('created_at')->get();
        $comments = $comments->each(function ($comment, $key) {
            $comment['user'] = User::find($comment->user_id);
        });
    }

    /**
     * Parse the Youtube Url
     *
     * @param  string  $url Youtube Url
     * @return string       Embed link
     */
    public function makeYoutubeUrl($url)
    {
        return substr(parse_url($url)['query'], 2);
    }
}
