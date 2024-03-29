<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessInformation extends Model
{
    use HasFactory;
    protected $table = 'business_information';
    public $fillable = [
        'business_name',
        'business_address',
        'city',
        'postal_code',
        'seller_id',
        'certificate_information',
        'comment'
    ];
    public function seller(){
        return $this->hasOne(Seller::class);
    }
}
