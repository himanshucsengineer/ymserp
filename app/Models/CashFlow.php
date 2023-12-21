<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'account_id',
        'type',
        'amount',
        'transfer_from',
        'transfer_to',
    ];
}
