<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    use Uuid;

    protected $fillable = [
        'property_type',
        'price',
        'address',
        'sale_type',
        'status',
        'price',
        'image'
    ];

    public function cart() {
        return $this->hasMany(Cart::class);
    }
    
    public function transactionDetail() {
        return $this->belongsTo(TransactionDetail::class);
    }
}
