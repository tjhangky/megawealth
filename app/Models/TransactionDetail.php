<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'property_id'];

    public function property() {
        return $this->hasOne(Property::class);
    }

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
}
