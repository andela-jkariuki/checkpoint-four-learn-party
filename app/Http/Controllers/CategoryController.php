<?php

namespace LearnParty\Http\Controllers;

use Illuminate\Http\Request;
use LearnParty\Http\Requests;
use LearnParty\Category;

class CategoryController extends Controller
{
    /**
     * Show videos under a category
     *
     * @param  string $category Category name
     * @return View
     */
    public function show($category)
    {
        $videos = Category::where('name', $category)->first()->videos()->paginate(12);

        return view('homepage', compact('videos'));
    }
}
