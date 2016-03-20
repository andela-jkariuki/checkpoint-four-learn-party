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
        $this->createVideoWithCategory();
        $video = LearnParty\Video::first();

        $this->visit('category/php')
            ->see('A swanky youtube tutorial title');
    }
}
