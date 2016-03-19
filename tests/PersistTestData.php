<?php

namespace LearnParty\Tests;

use Auth;

trait PersistTestData
{
    public function login()
    {
        $user = factory('LearnParty\User')->create(['email' => 'test@Learnparty.com']);
        return Auth::attempt(['email' => 'test@Learnparty.com', 'password' => '12345']);
    }
}
