<?php

namespace LearnParty\Http\Composers;

use LearnParty\Http\Repositories\VideoRepository;
use LearnParty\Category;

class SideNavComposer
{
    public function compose($view)
    {
        $videoRepository = new VideoRepository();

        $view->with('categories', Category::all());
        $view->with('topVideos', $videoRepository->getTopPopularVideos(3));
    }
}
