<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRepair extends Model
{
    use HasFactory;

    protected $fillable = [
        'damage_id',
        'repair_code',
        'desc',
        'createdby',
        'updatedby',
        'depo_id'
    ];
}
