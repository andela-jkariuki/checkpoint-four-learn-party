<?php

namespace LearnParty\Tests;

use Auth;

trait PersistTestData
{
    public function createAndLoginUser()
    {
        $user = factory('LearnParty\User')->create(['email' => 'test@Learnparty.com']);
        $authenticateUser = Auth::attempt(['email' => 'test@Learnparty.com', 'password' => '12345']);

        if ($authenticateUser) {
            return $user;
        }

        return false;
    }
}
