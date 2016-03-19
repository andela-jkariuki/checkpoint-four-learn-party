<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use LearnParty\Http\Repositories\VideoRepository;

class VideoTest extends TestCase
{
    use  LearnParty\Tests\PersistTestData;
    /**
     * VideoRepository getVideo test
     *
     * Test get a single Video
     *
     * @return void
     */
    public function testGetVideo()
    {
        $video = factory('LearnParty\Video')->create();
        $searchVideo = $this->videoRepository->getVideo($video->id);

        $this->assertTrue(is_array($searchVideo->toArray()));
        $this->assertEquals($video->title, $searchVideo->title);
        $this->assertEquals($video->url, $searchVideo->url);
    }

    /**
     * VideoRepository getAllComments test
     *
     * Test that a user viewing a video is able to get all the
     * comments on a video
     *
     * @return void
     */
    public function testGetAllComments()
    {
        $video = factory('LearnParty\Video')->create();
        $comments = factory('LearnParty\Comment', 3)->create(['video_id' => 1]);

        $getComments = $this->videoRepository->getAllComments($video->id);

        $this->assertTrue(is_array($getComments->toArray()));
        $this->assertArrayHasKey('comment', $getComments->toArray()[0]);
        $this->assertArrayHasKey('video_id', $getComments->toArray()[0]);
        $this->assertEquals($comments[0]->comment, $getComments->toArray()[0]['comment']);
        $this->assertEquals($comments[0]->video_id, $getComments->toArray()[0]['video_id']);
    }

    /**
     *  VideoRepository makeYoutubeUrl tests
     *
     * Test that the make Youtube Url correctly parses a youtube Url
     */

    public function testMakeYoutubeUrl()
    {
        $yotubeUrl = 'https://www.youtube.com/watch?v=pLs4Tex0U1U';
        $yotubeVideoId = 'pLs4Tex0U1U';

        $this->assertEquals($yotubeVideoId, $this->videoRepository->makeYoutubeUrl($yotubeUrl));
    }

    /**
     * VideoRepository updateViews test
     *
     * Test that when a user loads a video, they update the view on a video
     *
     * @return
     */
    public function testUpdateViews()
    {
        $video = factory('LearnParty\Video')->create(['views' => 5]);

        $this->assertEquals(5, $video->views);
        $this->videoRepository->updateViews($video->id);

        $this->assertEquals(6, $this->videoRepository->getVideo($video->id)->views);
    }

    /**
     * VideoRepository getLikeStatus
     *
     * Assert that the getLike status ..
     *
     *  returns false if not loggged in
     *  returns false if logged in and not like a video
     *  returns true if logged in and user has liked a video
     *
     * @return
     */
    public function testGetLikeStatus()
    {
        $video = factory('LearnParty\Video')->create();

        $this->assertFalse($this->videoRepository->getLikeStatus($video));

        $this->login();
        $this->assertFalse($this->videoRepository->getLikeStatus($video));

        $fav = factory('LearnParty\Favorite')->create(['user_id' => 1, 'video_id' => 1]);
    }

    /**
     * VideoRepository getTopPopularVideos
     *
     * Assert that getTopPopularVideos returns
     *
     * Top viwewed Videos
     * Top Favorited videos
     * Top Commented on videos
     * Users with the must videos
     *
     * @return void
     */
    public function testGetTopPopularVideos()
    {
        $users = factory('LearnParty\User', 20)->create();
        $videos = factory('LearnParty\Video', 20)->create();
        $favorites = factory('LearnParty\Favorite', 20)->create();
        $comments = factory('LearnParty\Comment', 20)->create();

        $popularVideosData = $this->videoRepository->getTopPopularVideos(3);

        $this->assertArrayHasKey('topViewed', $popularVideosData);
        $this->assertArrayHasKey('topFavorited', $popularVideosData);
        $this->assertArrayHasKey('topCommentedOn', $popularVideosData);
        $this->assertArrayHasKey('topUsers', $popularVideosData);

        $this->assertTrue(in_array(
            $popularVideosData['topViewed'][0]->title,
            array_column($videos->toArray(), 'title')
        ));

        $this->assertTrue(in_array(
            array_column($popularVideosData['topFavorited']->toArray(), 'url')[0],
            array_column($videos->toArray(), 'url')
        ));

        $this->assertTrue(in_array(
            array_column($popularVideosData['topCommentedOn']->toArray(), 'description')[0],
            array_column($videos->toArray(), 'description')
        ));

        $this->assertTrue(in_array(
            $popularVideosData['topUsers']->toArray()[0]['username'],
            array_column($users->toArray(), 'username')
        ));
    }

    /**
     * VideoRepository favoriteVideo, unfavoriteVideo
     *
     * Assert that a user can favorite and unfavorite a video
     *
     * @return
     */
    public function testFavoriteAndUnfavoriteVideo()
    {
        $video = factory('LearnParty\Video')->create();
        $this->login();
        $fav = $this->videoRepository->favoriteVideo(['user_id' => 1, 'video_id' => 1]);

        $this->assertArrayHasKey('status', $fav);
        $this->assertArrayHasKey('message', $fav);

        $this->assertEquals(200, $fav['status']);
        $this->assertEquals('favorited', $fav['message']);

        $unFav = $this->videoRepository->unFavoriteVideo(['user_id' => 1, 'video_id' => 1]);

        $this->assertEquals(200, $unFav['status']);
        $this->assertEquals('unfavorited', $unFav['message']);
    }

    /**
     * VideoRepository validVideoEditor
     *
     * Assert that we can validate the owner of a video from the
     * validVideoEditor.
     *
     * @return [type] [description]
     */
    public function testValidVideoEditor()
    {
        $myVideo = factory('LearnParty\Video')->create();
        $otherVideo = factory('LearnParty\Video')->create(['user_id' => 2]);

        $this->login();
        $this->assertTrue($this->videoRepository->validVideoEditor($myVideo));
        $this->assertFalse($this->videoRepository->validVideoEditor($otherVideo));
    }

    /**
     * Test the validation array for Videos
     *
     * @return
     */
    public function testVideoRequestValidationArray()
    {
        $videoRequest = new \LearnParty\Http\Requests\VideoRequest();
        $rules = $videoRequest->rules();

        $this->assertTrue($videoRequest->authorize());
        $this->assertTrue(is_array($rules));
        $this->assertArrayHasKey('title', $rules);
        $this->assertEquals('required|min:5|max:255', $rules['title']);
    }

    public function testShowVideo()
    {

        $user = factory('LearnParty\User')->create();
        $video = factory('LearnParty\Video')->create();
        $x = $this->call(
            'GET',
            'videos/' . $video->id,
            [
                '_token' => csrf_token()
            ]
        );
        $this->assertViewHasAll(['video', 'categories', 'comments', 'user', 'favorites', 'likesVideo']);

        $this->visit('videos/' . $video->id)
            ->see($video->title)
            ->see($user->name);
    }
}
