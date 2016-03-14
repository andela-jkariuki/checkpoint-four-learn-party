<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\User;
use Auth;

class UserController extends Controller
{
    /**
     * Return the user's profile page
     *
     * @return view
     */
    public function profile()
    {
        return view('dashboard.profile');
    }

    /**
     * update the user's record
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

        User::find(Auth::user()->id)
            ->update($request->all());

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Profile successfully updated.');

        return redirect('profile');
    }
}
