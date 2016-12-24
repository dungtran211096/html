<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call(ArticleSeeder::class);
        $this->call(UserQuestionSeeder::class);
        $this->call(AdminSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
