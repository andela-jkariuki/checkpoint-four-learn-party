<?php

namespace LearnParty\Http\Repositories;

use LearnParty\Video;
use LearnParty\Comment;
use LearnParty\Favorite;
use LearnParty\User;
use Auth;

class VideoRepository
{
    /**
     * Get a single video
     *
     * @return void
     */
    public function getVideo($id)
    {
        return Video::findOrFail($id);
    }

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
        return Comment::where('video_id', $videoId)->get();
        $comments = $comments->each(function ($comment, $key) {
            $comment['user'] = User::find($comment->user_id);
        });
    }

    /**
     * Parse the Youtube Url.
     *
     * @param  string  $url Youtube Url
     * @return string       Embed link
     */
    public function makeYoutubeUrl($url)
    {
        return substr(parse_url($url)['query'], 2, 11);
    }

    /**
     * Return true if a user has liked a video and
     * false if the user has not liked the vide.
     *
     * @param  Collection $video Video collection
     * @return boolean           True or false
     */
    public function getLikeStatus($video)
    {
        if (Auth::user()) {
            $favorites = $video->favorites;
            foreach ($favorites as $key => $favorite) {
                if ($favorite->user_id === Auth::user()->id) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Favorite a video.
     *
     * @param  Request $request User request
     * @return array            New favorite message
     */
    public function favoriteVideo($request)
    {
        Favorite::create($request);
        return [
            'status' => 200,
            'message' => 'favorited'
        ];
    }

    /**
     * Unfavorite a video.
     *
     * @param  Request $request User request
     * @return array            New unfavorite message
     */
    public function unfavoriteVideo($request)
    {
        Favorite::where('user_id', Auth::user()->id)
              ->where('video_id', $request['video_id'])
              ->delete();

        return [
            'status' => 200,
            'message' => 'unfavorited'
        ];
    }

    /**
     * If the person trying to edit or delete a video is not the
     * owner, redirect to the homepage
     *
     * @param  Object $video Video collection
     * @return boolean        true if valid, otherwise false
     */
    public function validVideoEditor($video)
    {
        if (Auth::user()->id == $video->user_id) {
            return true;
        }

        return false;
    }

    /**
     * Get the most popular videos in the followin categories
     * Liked
     * commented on
     * Favorited
     *
     * @return array  top popular videos
     */
    public function getTopPopularVideos($number = 3)
    {
        $topViewed = Video::orderBy('views', 'DESC')->get()->take($number);

        $topFavorited = Video::all()->each(function ($video, $key) {
            $video->favorites = $video->favorites->count();
        })->sortByDesc('favorites')->take($number);

        $topCommentedOn = Video::all()->each(function ($video, $key) {
            $video->comments = $video->comments->count();
        })->sortByDesc('comments')->take($number);

        $topUsers = User::all()->each(function ($user, $key) {
            $user->videos = $user->videos->count();
        })->sortByDesc('videos')->take(5);

        return [
            'topViewed' => $topViewed,
            'topFavorited' => $topFavorited,
            'topCommentedOn' => $topCommentedOn,
            'topUsers' => $topUsers,
        ];
    }
}
