<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
    use  LearnParty\Tests\PersistTestData;
    use DatabaseMigrations;

    /**
     * Assert that a user is able to view their profile.
     *
     * @return void
     */
    public function testUserCanViewProfile()
    {
        $user = factory('LearnParty\User')->create();

        $this->actingAs($user)
             ->visit('/profile')
             ->see($user->name);
    }

    /**
     * Assert that a user can update their profile.
     *
     * @return void
     */
    public function testUserCanUpdateProfile()
    {
        $user = factory('LearnParty\User')->create();
        $this->actingAs($user)
             ->visit('/profile')
             ->type('A swanky new profile update', 'about')
             ->press('update-profile')
             ->seeInDatabase('users', ['about' => 'A swanky new profile update']);
    }

    /**
     * Assert that users can see all the videos uploaded by a specific
     * user.
     *
     * @return void
     */
    public function testUsersCanSeeVideosByAUser()
    {
        $user = factory('LearnParty\User')->create();
        $videos = factory('LearnParty\Video', 3)->create(['user_id' => 1]);

        $this->visit('users/' .$user->id)
             ->see($videos[0]->name)
             ->see($videos[1]->name)
             ->see($videos[2]->name);

        $this->call(
            'GET',
            'users/' . $user->id
        );
        $this->assertViewHasAll(['user', 'videos', 'headline']);
    }

    /**
     * If a user has registered before using social auth, return a user object
     * else, create a new user record.
     *
     * @return void
     */
    public function testAuthenticateUser()
    {
        $user = (object)[
            "id" => 1001,
            "nickname" => "testusername",
            "name" => "Test Name",
            "email" => "test@suyabay.com",
            "avatar_original" => "imageUrl"
        ];

        $newUser = $this->userRepository->authenticateUser($user, 'facebook')->toArray();
        $this->assertTrue(is_array($newUser));
        $this->assertArrayHasKey('username', $newUser);
        $this->assertEquals('Test Name', $newUser['name']);
        $this->seeInDatabase('users', ['email' => 'test@suyabay.com']);
    }

    /**
     * test User repositoriy's updateUserInfo
     *
     * @return void
     */
    public function testUpdateUserInfo()
    {
        $this->createAndLoginUser();
        $updateUser = $this->userRepository->updateUserInfo(['about' => 'A swanky new bio about me']);

        $this->assertTrue($updateUser);
        $this->seeInDatabase('users', ['about' => 'A swanky new bio about me']);
    }

    /**
     * Test that a user can have many comments
     *
     * @return void
     */
    public function testUserCommentsRelationship()
    {
        $user = $this->createAndLoginUser();
        $video = factory('LearnParty\Video')->create();
        $comments = factory('LearnParty\Comment', 2)->create(['user_id' => 1]);

        $this->assertEquals($user->id, $user->comments[0]->user_id);
        $this->assertEquals($user->id, $user->comments[1]->user_id);
    }
}
