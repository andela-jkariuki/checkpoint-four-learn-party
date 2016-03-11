<?php

namespace LearnParty\Http\Repositories;

use LearnParty\User;

class UserRepository
{
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
