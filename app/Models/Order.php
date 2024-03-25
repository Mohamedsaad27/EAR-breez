<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'items',
        'total_value'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function scopeSearch($query, $value) {
        $query->where('id', 'like', "%{$value}%")
            ->orWhere('status', 'like', "%{$value}%")
            ->orWhere('user_id', 'like', "%{$value}%")
            ->orWhereHas('user', function ($subQuery) use ($value) {
                $subQuery->where('name', 'like', "%{$value}%");
            });
    }

}
