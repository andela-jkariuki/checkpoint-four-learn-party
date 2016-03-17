<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
    public static $youtubeVideos = [
        'https://www.youtube.com/watch?v=m1_EDno-44M',
        'https://www.youtube.com/watch?v=pLs4Tex0U1U',
        'https://www.youtube.com/watch?v=UDwe95oocsw',
        'https://www.youtube.com/watch?v=3Hn9hLOljJI',
        'https://www.youtube.com/watch?v=LrCHz1gwzTo',
        'https://www.youtube.com/watch?v=JQbiR2gtyw0',
        'https://www.youtube.com/watch?v=H_AQFnqMY3E',
        'https://www.youtube.com/watch?v=ttWobUlBFOY',
        'https://www.youtube.com/watch?v=ReI6gvzVP0Y',
        'https://www.youtube.com/watch?v=UDwe95oocsw',
        'https://www.youtube.com/watch?v=k8tzfpeyPzw',
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
            'url' => 'https://www.youtube.com/watch?v=m1_EDno-44M',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=pLs4Tex0U1U',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=UDwe95oocsw',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=3Hn9hLOljJI',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=LrCHz1gwzTo',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=JQbiR2gtyw0',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=H_AQFnqMY3E',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=ttWobUlBFOY',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=ReI6gvzVP0Y',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=UDwe95oocsw',
            'views' => rand(1, 100)
        ]);

        factory(LearnParty\Video::class)->create([
            'url' => 'https://www.youtube.com/watch?v=k8tzfpeyPzw',
            'views' => rand(1, 100)
        ]);
    }
}
