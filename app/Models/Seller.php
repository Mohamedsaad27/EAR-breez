<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function contactus(){
        $this->hasMany(ContactUs::class);
    }
    public function businessInformation()
    {
        return $this->hasOne(BusinessInformation::class);
    }
    public function businessContactInformation()
    {
        return $this->hasOne(BusinessContactInformation::class);
    }
    public  function bankTransfer(){
        return $this->hasOne(BankTransfers::class);
    }
}
