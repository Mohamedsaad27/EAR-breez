<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessContactInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'website',
        'address',
        'seller_id'
    ];
    public  function seller(){
        return $this->hasOne(Seller::class);
    }
}
