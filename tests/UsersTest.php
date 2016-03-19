<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
    use  LearnParty\Tests\PersistTestData;

    /**
     * Assert that a user is able to view their profile
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
     * Assert that a user can update their profile
     *
     * @return void
     */
    public function testUserCanUpdateProfile()
    {
        $user = factory('LearnParty\User')->create();
        $x = $this->actingAs($user)
             ->visit('/profile')
             ->type('A swanky new profile update', 'about')
             ->press('update-profile');
    }
}
