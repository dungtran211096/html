<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->truncate();
        for ($i = 1; $i < 5; $i++) {
            \App\School::create([
                'name' => 'Trường ' . $i,
                'active' => 1
            ]);
        }
    }
}
