<?php

namespace LearnParty\Http\Controllers;

use LearnParty\Http\Repositories\VideoRepository;
use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\Favorite;
use LearnParty\Video;
use Auth;

class FavoritesController extends Controller
{
    /**
     * __construct Create VideoRepository instance
     *
     * @param VideoRepository $videoRepository VideoRepository
     */
    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * Add a new favorite if it does not exist and
     * remove it if does exist
     *
     * @param  Request $request User request
     * @return array           favorite or unfavorite message
     */
    public function update(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $favorite = Favorite::where('user_id', Auth::user()->id)
                       ->where('video_id', $request->input('video_id'))
                       ->get();

        if ($favorite->count() === 0) {
            return $this->videoRepository->favoriteVideo($request->all());
        }

        return $this->videoRepository->unFavoriteVideo($request->all());
    }
}
