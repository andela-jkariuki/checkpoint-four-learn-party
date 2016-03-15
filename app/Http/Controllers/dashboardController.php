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

    /**
     * Add a new video and also add a list of all categories that it belongs
     * to
     *
     * @param  VideoRequest $request Request
     * @return Redirect to create page
     */
    public function store(VideoRequest $request)
    {
        $newVideo = Auth::user()->videos()->create($request->all());
        $this->syncCategories($newVideo, $request->input('category_list'));

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Video successfully added.');

        return redirect('dashboard/create');
    }

    /**
     * Display the edit page for a new video.
     *
     * @param  integer $id Video Id
     * @return View    Edit video View
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $categories = Category::lists('name', 'id');

        return view('dashboard.edit_video', compact('categories', 'video'));
    }

    /**
     * Update an existing video
     *
     * @param  VideoRequest $request  Validation request
     * @param  integer       $id      Video Id
     * @return Redirect               Redirect to episode page
     */
    public function update(VideoRequest $request, $id)
    {
        $updatdVideo = Video::findOrFail($id);
        $updatdVideo->update($request->all());
        $this->syncCategories($updatdVideo, $request->input('category_list'));

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Video successfully updated.');

        return redirect('dashboard/videos/' . $id . '/edit');
    }

    private function syncCategories($video, $tags)
    {
        $video->categories()->sync($tags);
    }
}
