<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
    public static $youtubeVideos = [
        'm1_EDno-44M',
        'pLs4Tex0U1U',
        'UDwe95oocsw',
        '3Hn9hLOljJI',
        'LrCHz1gwzTo',
        'JQbiR2gtyw0',
        'H_AQFnqMY3E',
        'ttWobUlBFOY',
        'ReI6gvzVP0Y',
        'UDwe95oocsw',
        'k8tzfpeyPzw',
    ];
    */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LearnParty\Video::class)->create([
            'url' => 'm1_EDno-44M',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'pLs4Tex0U1U',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'UDwe95oocsw',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => '3Hn9hLOljJI',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'LrCHz1gwzTo',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'JQbiR2gtyw0',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'H_AQFnqMY3E',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'ttWobUlBFOY',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'ReI6gvzVP0Y',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'UDwe95oocsw',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class, 40)->create([
            'url' => 'k8tzfpeyPzw',
            'views' => rand(1, 100)
        ]);
    }
}
