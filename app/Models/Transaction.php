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
        'before_file3',
        'before_file4',
        'before_file5',
        'before_file6',
        'after_file1',
        'after_file2',
        'after_file3',
        'after_file4',
        'after_file5',
        'after_file6',
        'location_code',
        'dimension_h',
        'dimension_w',
        'dimension_l',
        'actual_material'
    ];
}
