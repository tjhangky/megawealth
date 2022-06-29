<?php

namespace App\Models;

use App\Traits\Uuid;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    use Uuid;

    protected $fillable = ['user_id'];

    public function transactionDetail() {
        return $this->hasMany(TransactionDetail::class);
    }
}
