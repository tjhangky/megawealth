<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_type',
        'price',
        'address',
        'property_type',
        'sale_type',
        'status',
        'price',
        'image'
    ];

    public function cart() {
        return $this->hasMany(Cart::class);
    }
    
}
