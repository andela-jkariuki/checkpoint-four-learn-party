<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    /**
     * Learn party root
     */
    Route::get('/', 'HomeController@index');

    /**
     * Get authenitcated user's profile page
     */
    Route::get('profile', [
        'uses' => 'UserController@profile',
        'as' => 'profile'
    ]);

    /**
     * Update an authenticated user's profile page
     */
    Route::put('profile/edit', [
        'uses' => 'UserController@update',
        'as' => 'edit_profile'
    ]);

    /**
     * Update an authenticated user's avatar
     */
    Route::patch('profile/edit/avatar', [
        'uses' => 'UserController@updateAvatar',
        'as' => 'update_avatar'
    ]);

    /**
     * Show the new video page
     */
    Route::get('dashboard/videos/create', [
            'uses' => 'DashboardController@create',
            'as' => 'create_video'
        ]);

    /**
     * Create new video post
     */
        Route::post('dashboard/videos/create', [
            'uses' => 'DashboardController@store',
            'as' => 'create_video'
        ]);

    /**
     * Get the edit page for a single episode
     */
        Route::get('dashboard/videos/{id}/edit', [
            'uses' => 'DashboardController@edit',
            'as' => 'edit_video'
        ]);

    /**
     * Update an exisiting video details
     */
        Route::patch('dashboard/videos/{id}', [
            'uses' => 'DashboardController@update',
            'as' => 'update_video'
        ]);

    /**
     * Create new comment
     */
        Route::post('comments/create', [
            'uses' => 'CommentController@create',
            'as' => 'new_comment'
        ]);

    /**
     * View Single video
     */
        Route::get('videos/{id}', [
            'uses' => 'VideoController@show',
            'as' => 'show_video'
        ]);

        /**
         * add a new favorite to a video or 
         * remove an existing one
         */
        Route::post('favorites/update', [
            'uses'=> 'FavoritesController@update',
            'as' => 'update_favorite'
        ]);

    /**
     * redirect to social auth login using socialite
     */
        Route::get('/auth/{provider}', 'Auth\AuthController@redirectToProvider');

    /**
     * Handlr scoail auth provider feedback data
     */
        Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});
