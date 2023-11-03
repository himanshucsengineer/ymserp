<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'damage_id',
        'repiar_id',
        'material_code',
        'desc',
        'createdby',
        'updatedby',
        'depo_id'
    ];
}
