<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentsTest extends TestCase
{
    use LearnParty\Tests\PersistTestData;
    use DatabaseMigrations;

    /**
     * Assert that an authentocated user can craete a comment on an existing
     * video.
     *
     * @return void
     */
    public function testCreateComment()
    {
        $user = $this->createAndLoginUser();
        $video = factory('LearnParty\Video')->create();

        $feedback = $this->actingAs($user)
             ->call('POST', 'comments/create', [
                    '_token' => csrf_token(),
                    'comment' => 'A swanky new comment',
                    'video_id' => $video->id
             ]);
        $this->assertTrue(is_array($feedback->original));
        $this->assertEquals('New comment succesfully added.', $feedback->original['message']);
    }
}
