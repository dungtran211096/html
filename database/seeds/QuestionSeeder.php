<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('questions')->truncate();
        for ($i = 1; $i < 20; $i++) {
            \App\Question::create([
                'name' => $faker->sentence(10),
                'active' => 1,
                'image' => '/htmlcss/img/minion.jpg',
                'content' => $faker->sentences(10, 1),
                'excerpt' => $faker->sentence(15, 1)
            ]);
        }
    }
}
