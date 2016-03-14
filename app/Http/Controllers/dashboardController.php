<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\Http\Requests\VideoRequest;
use LearnParty\Video;
use LearnParty\Category;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return view to create new Video post
     *
     * @return View Object
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');

        return view('dashboard.new_video', compact('categories'));
    }

    public function store(VideoRequest $request)
    {
        $video = Auth::user()->videos()->create($request->all());
        $video->categories()->attach($request->input('category_list'));

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Video successfully added.');

        return redirect('dashboard/create');
    }
}
