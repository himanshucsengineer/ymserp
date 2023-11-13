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
        'gatein_id',
        'qty',
        'before_file1',
        'before_file2',
        'after_file1',
        'after_file2'
    ];
}
