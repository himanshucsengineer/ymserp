<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
 

    protected $fillable = [
        'tarrif_id',
        'labour_hr',
        'labour_cost',
        'material_cost',
        'sab_total',
        'tax_cost',
        'gst',
        'total',
        'createdby',
        'updatedby',
        'depo_id',
    ];
}
