<?php

namespace LearnParty\Http\Controllers;

use LearnParty\Http\Repositories\VideoRepository;
use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\Http\Requests\VideoRequest;
use LearnParty\Video;
use LearnParty\Category;
use Auth;

class DashboardController extends Controller
{
    public function __construct(VideoRepository $videoRepository)
    {
        $this->middleware('auth');
        $this->videoRepository = $videoRepository;
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
        $request['url'] = $this->videoRepository->makeYoutubeUrl($request->all()['url']);

        $newVideo = Auth::user()->videos()->create($request->all());
        $this->syncCategories($newVideo, $request->input('category_list'));

        return redirect('videos/' . $newVideo->id);
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

        if (!$this->videoRepository->validVideoEditor($video)) {
            return redirect()->route('homepage');
        }

        $video->url = 'https://www.youtube.com/watch?v='.$video->url;
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
        $video = Video::findOrFail($id);

        if (!$this->videoRepository->validVideoEditor($video)) {
            return redirect()->route('homepage');
        }

        $request['url'] = $this->videoRepository->makeYoutubeUrl($request->all()['url']);
        $video->update($request->all());
        $this->syncCategories($video, $request->input('category_list'));

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Video successfully updated.');

        return redirect('dashboard/videos/' . $id . '/edit');
    }

    /**
     * Delete a video
     *
     * @param  Integer $id Video Id
     * @return Redirect     Redirect use to appropriate page
     */
    public function delete(Request $request, $id)
    {
        if ($this->videoRepository->validVideoEditor(Video::findOrFail($id)) && Video::destroy($id)) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Video successfully deleted.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('message', 'Error Deleting video. Please try again');
        }

        return [
            'message' => 'redirect'
        ];
    }

    /**
     * Add link between video and category in
     * pivot table
     *
     * @param  Object $video Video object
     * @param  array $tags   Associated tag Ids
     * @return void
     */
    private function syncCategories($video, $tags)
    {
        $video->categories()->sync($tags);
    }
}
