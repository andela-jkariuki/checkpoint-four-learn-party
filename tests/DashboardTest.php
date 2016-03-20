<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashboardTest extends TestCase
{
    use LearnParty\Tests\PersistTestData;
    use DatabaseMigrations;

    /**
     * Assert that an authenticated user can see the create video page
     * and create it
     *
     * @return void
     */
    public function testUserCanCreateVideo()
    {
        $this->createAndLoginUser();
        $categories = factory('LearnParty\Category', 4)->create();

        $this->visit('dashboard/videos/create')
             ->see('New Video Post')
             ->press('new-video')
             ->see('The url field is required.')
             ->type('A swanky youtube tutorial title', 'title')
             ->type('http://facebook.com', 'url')
             ->press('new-video')
             ->see('The url must be a valid youtube video Url')
             ->type('https://www.youtube.com/watch?v=pLs4Tex0U1U', 'url')
             ->type('A swanky new description of the video', 'description')
             ->select($categories[0]['id'], 'category_list')
             ->select($categories[1]['id'], 'category_list')
             ->press('new-video')
             ->see('A swanky youtube tutorial title');

        $this->seeinDatabase('videos', [
            'title' => 'A swanky youtube tutorial title',
            'url' => 'pLs4Tex0U1U'
        ]);
    }
}
