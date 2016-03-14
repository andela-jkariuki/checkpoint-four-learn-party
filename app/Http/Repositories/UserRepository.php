<?php

namespace LearnParty\Http\Repositories;

use Illuminate\Contracts\Filesystem\Filesystem;
use LearnParty\User;
use Storage;
use Auth;
use Cloudder;

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

    /**
     * upload an avatar to cloudinary and return url
     *
     * @param  Request $request Request from user
     * @return string           Cloudinary Url
     */
    public function uploadAvatar($request)
    {
        $avatar = $request->file('avatar');
        $avatar = Cloudder::upload($avatar, null, [
            "format" => "jpg",
            "crop" => "fill",
            "width" => 250,
            "height" => 250]);

        return  Cloudder::getResult()['url'];
    }

    /**
     * Update user info
     *
     * @param  array  $data Data to update
     * @return boolean       True or false
     */
    public function updateUserInfo(array $data)
    {
        return User::find(Auth::user()->id)->update($data);
    }
}
