<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LearnParty\Category::class)->create([
            'name' => 'php'
        ]);
        factory(LearnParty\Category::class)->create([
            'name' => 'java'
        ]);
        factory(LearnParty\Category::class)->create([
            'name' => 'ruby'
        ]);
        factory(LearnParty\Category::class)->create([
            'name' => 'javascript'
        ]);
        factory(LearnParty\Category::class)->create([
            'name' => 'python'
        ]);
    }
}
