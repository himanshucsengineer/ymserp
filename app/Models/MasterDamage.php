<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDamage extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'desc',
        'createdby',
        'updatedby',
        'depo_id'
    ];
}
