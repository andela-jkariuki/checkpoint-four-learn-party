<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
    use  LearnParty\Tests\PersistTestData;

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
             ->press('update-profile');
    }

    /**
     * Assert that users can see all the videos uploaded by a specific
     * user
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
}
