<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    use HasFactory;

    use Uuid;

    protected $fillable = ['transaction_id', 'property_id'];

    public function property() {
        return $this->hasOne(Property::class);
    }

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
}
