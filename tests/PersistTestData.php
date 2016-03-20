<?php

namespace LearnParty\Tests;

use Auth;

trait PersistTestData
{
    /**
     * Register and authneticate a user
     *
     * @return boolean false or object
     */
    public function createAndLoginUser()
    {
        $user = factory('LearnParty\User')->create(['email' => 'test@Learnparty.com']);
        $authenticateUser = Auth::attempt(['email' => 'test@Learnparty.com', 'password' => '12345']);

        if ($authenticateUser) {
            return $user;
        }

        return false;
    }

    /**
     * add a video with a category
     *
     * @return Object Uplaoded vIdeo
     */
    public function createVideoWithCategory()
    {
        $category1 = factory('LearnParty\Category')->create(['name' => 'php']);

        return $this->visit('dashboard/videos/create')
             ->see('New Video Post')
             ->type('A swanky youtube tutorial title', 'title')
             ->type('https://www.youtube.com/watch?v=pLs4Tex0U1U', 'url')
             ->type('A swanky new description of the video', 'description')
             ->select($category1->id, 'category_list')
             ->press('new-video');
    }
}
