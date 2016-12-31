<?php

use Illuminate\Database\Seeder;
use App\Option;
use App\User;

class UserQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('user_data')->truncate();
        $a = ['daoduc', 'hoctap', 'theluc', 'tinhnguyen', 'hoinhap'];
        $faker = \Faker\Factory::create();
        foreach ($a as $item) {
            Option::where('name', $item)->delete();
            for ($i = 1; $i <= 3; $i++) {
                $value["key$i"] = "cau hoi $item thu $i";
            }
            Option::create([
                'name' => $item,
                'value' => serialize($value)
            ]);
        }

        for ($i = 0; $i < 3; $i++) {
            $answers = [];
            foreach ($a as $item) {
                $questions = getOption($item);
                foreach ($questions as $key => $value) {
                    $answers[$item][$key] = $faker->sentence(10);
                }
                $answers[$item] = serialize($answers[$item]);
            }
            $user = User::create([
                'name' => $faker->userName,
                'active' => 1,
                'is_5toter' => rand(0, 1),
                'admin' => 0,
                'avatar' => '/htmlcss/img/minion.jpg',
                'school_id' => rand(1, 4),
                'password' => bcrypt("123456"),
                'email' => $faker->email,
            ]);
            $answers['user_id'] = $user->id;
            \App\UserData::create($answers);
        }

    }
}