<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;

use LearnParty\Http\Requests;

class UserController extends Controller
{
    public function profile()
    {
        return view('dashboard.profile');
    }

    public function update(Request $request)
    {
        dd($request);
    }
}
