<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'     => 'Mandalika Ayusti Nawangsari',
            'email'    => 'manda.pumkins@gmail.com',
            'password' => bcrypt('password'),
            'roles'    => 'USER'
        ]);
    }
}
