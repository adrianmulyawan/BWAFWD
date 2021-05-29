<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // user seeder 
        $this->call(UserSeeder::class);

        // transaction seeder 
        $this->call(TransactionSeeder::class);

        // transaction details seeder
        $this->call(TransactionDetailSeeder::class);
    }
}
