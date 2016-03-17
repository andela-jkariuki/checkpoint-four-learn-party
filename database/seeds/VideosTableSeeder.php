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
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'pLs4Tex0U1U',
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'UDwe95oocsw',
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => '3Hn9hLOljJI',
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'LrCHz1gwzTo',
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'JQbiR2gtyw0',
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'H_AQFnqMY3E',
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'ttWobUlBFOY',
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'ReI6gvzVP0Y',
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'UDwe95oocsw',
        ]);

        factory(LearnParty\Video::class, 40)->create([
            'url' => 'k8tzfpeyPzw',
        ]);
    }
}
