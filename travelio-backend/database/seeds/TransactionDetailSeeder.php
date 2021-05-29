<?php

use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TransactionDetail::create([
            'travel_packages_id' => 1,
            'username'           => 'mndaysti',
            'nationality'        => 'ID',
            'is_visa'            => true,
            'doe_passport'       => '',
        ]);
    }
}
