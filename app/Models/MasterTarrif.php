<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTarrif extends Model
{
    use HasFactory;

    protected $fillable = [
        'line_id',
        'damade_id',
        'repair_id',
        'material_id',
        'repai_location_code',
        'unit_of_measure',
        'dimension_l',
        'dimension_w',

        'dimension_h',
        'labour_hour',
        'labour_cost',
        'material_cost',
        'tax',
        'tax_cost',
        'sub_total',
        'total_cost',
        'createdby',
        'updatedby',
        'depo_id',
        'component_code',
        'desc',
        'qty',
        'repair_type'
    ];
}
