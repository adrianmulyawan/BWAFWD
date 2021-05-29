<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';

    protected $fillable = [
        'travel_packages_id', 'users_id', 'additional_visa', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [];

    // relasi ke table transaction_details (untuk melihat detail)
    public function transaction_details() {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    // relasi ke table travel_packages (melihat travel package yang dipilih)
    public function travel_package() {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }

    // relasi ke table users (melihat user yang mendaftarkan ke travel package ini)
    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
