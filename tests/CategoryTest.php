<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use  LearnParty\Tests\PersistTestData;
    use DatabaseMigrations;

    /**
     * Test that a user can view videos  by category
     *
     * @return void
     */
    public function testCategoryViews()
    {
        $this->createAndLoginUser();
        $this->createVideoWithCategory('php');
        $video = LearnParty\Video::first();

        $this->visit('category/php')
            ->see('A swanky youtube tutorial title');
    }

    /**
     * assert that a video can have many category can have many videos
     *
     * @return void
     */
    public function testVideoFavoriteRelationship()
    {
        $user = $this->createAndLoginUser();
        $video1 = $this->createVideoWithCategory('php');
        $video2 = $this->createVideoWithCategory('javascript');

        $this->assertEquals('php', LearnParty\Video::find(1)->categories->toArray()[0]['name']);
        $this->assertEquals('javascript', LearnParty\Video::find(2)->categories->toArray()[0]['name']);

        $this->assertEquals(LearnParty\Category::find(1)->videos->toArray()[0]['title'], LearnParty\Video::find(1)->title);
        $this->assertEquals(LearnParty\Category::find(2)->videos->toArray()[0]['url'], LearnParty\Video::find(2)->url);
    }
}
