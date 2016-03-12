<?php

namespace LearnParty\Http\Repositories;

use LearnParty\User;

class UserRepository
{
    /**
     * If a user has registered before using social auth, return a user object
     * else, create a new user record
     *
     * @param  array  $user     Socialite user object
     * @param  string $provider Social auth provider service
     * @return collection       User data
     */
    public function authenticateUser($user, $provider)
    {
        $userData = [
            'name' => $user->name,
            'username' => $user->nickname,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'provider_id' => $user->id,
            'provider' => $provider
        ];

        return $authUser = User::firstOrCreate($userData);
    }
}
