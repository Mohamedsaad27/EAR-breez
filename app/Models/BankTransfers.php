<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransfers extends Model
{
    use HasFactory;
    protected $table = 'bank_transfers';
    protected $fillable = [
    'amount',
    'country',
    'swift_code',
    'iban',
    'account_number',
    'account_holder_name',
    'address',
    'phone_number',
    'seller_id'
];
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
