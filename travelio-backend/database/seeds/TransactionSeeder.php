<?php

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Transaction::create([
            'travel_packages_id'     => 1,
            'users_id'               => 2,
            'additional_visa'        => 190,
            'transaction_total'      => 290,
            'transaction_status'     => 'PENDING'
        ]);
    }
}
