<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    use Uuid;

    protected $fillable = [
        'user_id',
        'property_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function property() {
        return $this->belongsTo(Property::class);
    }
}
