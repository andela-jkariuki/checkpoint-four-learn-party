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
        if (User::where('provider_id', $user->id)->count() === 0) {
             $userData = [
                'name' => $user->name,
                'username' => $user->nickname,
                'email' => $user->email,
                'avatar' => $provider === 'github' ? $user->avatar : $user->avatar_original,
                'provider_id' => $user->id,
                'provider' => $provider,
                'about' => $provider === 'twitter' ? $user->user['description'] : '',
            ];

            User::create($userData);
        }
       
        return User::where('provider_id', $user->id)->first();
    }
}
