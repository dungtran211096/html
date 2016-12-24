<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'admin' => 1,
            'active' => 1,
            'username' => 'Admin',
            'password' => bcrypt('123456'),
            'email' => 'uet.duy@gmail.com'
        ]);
    }
}
