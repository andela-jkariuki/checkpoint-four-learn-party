<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\Http\Requests\VideoRequest;
use LearnParty\Video;
use Auth;

class dashboardController extends Controller
{
    public function create()
    {
        return view('dashboard.new_video');
    }

    public function store(VideoRequest $request)
    {
        $video = Auth::user()->videos()->create($request->all());

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Video successfully added.');

        return redirect('dashboard/create');
    }
}
