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
    Route::get('/', [
            'uses' => 'HomeController@index',
            'as' => 'homepage'
    ]);

    /**
     * Authentication routes
     */
    Route::group(['prefix' => '/auth/{provider}'], function () {
        /**
         * redirect to social auth login using socialite
         */
        Route::get('', 'Auth\AuthController@redirectToProvider');

        /**
         * Handle social auth provider feedback data
         */
        Route::get('callback', 'Auth\AuthController@handleProviderCallback');
    });

    /**
     * User profile routes
     */
    Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {

        /**
         * Get authenitcated user's profile page
         */
        Route::get('', [
            'uses' => 'UserController@profile',
            'as' => 'profile'
        ]);

        /**
         * Update an authenticated user's profile page
         */
        Route::put('edit', [
            'uses' => 'UserController@update',
            'as' => 'edit_profile'
        ]);

        /**
         * Update an authenticated user's avatar
         */
        Route::patch('edit/avatar', [
            'uses' => 'UserController@updateAvatar',
            'as' => 'update_avatar'
        ]);
    });

    /**
     * User dashboard routes
     */
    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
        /**
         * Show the new video page
         */
        Route::get('videos/create', [
                'uses' => 'DashboardController@create',
                'as' => 'create_video'
            ]);

        /**
         * Create new video post
         */
        Route::post('videos/create', [
            'uses' => 'DashboardController@store',
            'as' => 'create_video'
        ]);

        /**
         * List of all videos uploaded by a user
         */
        Route::get('videos/uploads', [
            'uses' => 'DashboardController@uploads',
            'as' => 'video_uploads'
        ]);

        /**
         *  List of all videos favorited by a user
         */
        Route::get('videos/favorites', [
            'uses' => 'DashboardController@favorites',
            'as' => 'video_favorites'
        ]);

        /**
         * Get the edit page for a single episode
         */
        Route::get('videos/{id}/edit', [
            'uses' => 'DashboardController@edit',
            'as' => 'edit_video'
        ]);

        /**
         * Update an exisiting video details
         */
        Route::put('videos/{id}', [
            'uses' => 'DashboardController@update',
            'as' => 'update_video'
        ]);

        /**
         * Delete a video
         */
        Route::delete('videos/{id}', [
            'uses' => 'DashboardController@delete',
            'as' => 'delete_video'
        ]);
    });

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
     * Create new comment
     */
    Route::post('comments/create', [
        'uses' => 'CommentController@create',
        'as' => 'new_comment'
    ]);

    /**
     * Get all videos that are under a certain category
     *
     */
    Route::get('category/{category}', [
        'uses' => 'CategoryController@show',
        'as' => 'show_category'
    ]);

    /**
     * Get all videos that belong to a given user
     *
     */
    Route::get('users/{user}', [
        'uses' => 'UserController@userVideos',
        'as' => 'show_user'
    ]);
});
