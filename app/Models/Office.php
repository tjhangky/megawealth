<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;

    use Uuid;

    protected $fillable = [
        'name',
        'address',
        'contact_name',
        'contact_phone',
        'image'
    ];
}
