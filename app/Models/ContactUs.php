<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_name',
        'seller_email',
        'subject',
        'message',
        'seller_id'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
