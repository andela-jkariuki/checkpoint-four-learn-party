<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\User;
use Auth;

class UserController extends Controller
{
    /**
     * Return the user's profile page.
     *
     * @return view
     */
    public function profile()
    {
        return view('dashboard.profile');
    }

    /**
     * update the user's record.
     *
     * @param  Request $request User request
     * @return
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255|unique:users,username,'.Auth::user()->id,
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id,
            'about' => 'required|min:5',
        ]);

        $this->userRepository->updateUserInfo($request->all());

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Profile successfully updated.');

        return redirect('profile');
    }

    /**
     * upload an avatar to cloudinary and return url.
     *
     * @param  Request $request Request from user
     * @return Object           redirect to profile page
     */
    public function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image',
        ]);

        if ($request->file('avatar')->isValid()) {
            $url = $this->userRepository->uploadAvatar($request);

            if (filter_var($url, FILTER_VALIDATE_URL) && $this->userRepository->updateUserInfo(['avatar' => $url])) {
                $request->session()->flash('status', 'success');
                $request->session()->flash('message', 'Avatar successfully updated.');
            } else {
                $request->session()->flash('status', 'error');
                $request->session()->flash('message', 'Error Uploading avatar.');
            }

        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('message', 'Invalid file upload');
        }

        return redirect('profile');
    }

    /**
     * Get all videos that belong to a user.
     *
     * @param  Intger $user the user id
     * @return Video
     */
    public function userVideos($user)
    {
        $user = User::find($user);
        $videos = $user->videos()->paginate(7);
        $headline = $user->videos()->first();

        return view('user_videos', compact('user', 'videos', 'headline'));
    }
}
