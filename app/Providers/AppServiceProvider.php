<?php

namespace LearnParty\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use LearnParty\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('youtube_url', function ($attribute, $value, $parameters, $validator) {

            $urlParts = [
                'scheme',
                'host',
                'path',
                'query',
            ];

            if ($url = parse_url($value)) {
                if (count(array_diff($urlParts, array_keys($url))) == 0) {
                    return $url['host'] === 'youtube.com' || $url['host'] === 'www.youtube.com';
                }
            }
            return false;
        });

        view()->composer('layouts.side_nav', 'LearnParty\Http\Composers\SideNavComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
