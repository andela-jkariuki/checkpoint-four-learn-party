<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    use  LearnParty\Tests\PersistTestData;
    use DatabaseMigrations;

    /**
     * Assert that a user can see all videos on the homepage
     *
     * assert that pagination works
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->visit('/')
             ->see('Get the best learning materials online. ');

        $this->createAndLoginUser();
        $users = factory('LearnParty\User', 10)->create();
        $videos = factory('LearnParty\Video', 5)->create();
        $latestVideo = factory('LearnParty\Video')->create();

        $this->call('GET', '/');
        $this->assertviewHas('videos');

        $this->visit('/')
            ->see($videos[0]['title']);

        $videos = factory('LearnParty\Video', 13)->create();
        $this->call('GET', '/?page=2');
         $this->assertviewHas('videos');
    }
}
