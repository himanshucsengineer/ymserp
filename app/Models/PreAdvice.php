<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreAdvice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'line_id',
        'do_no',
        'validity_period',
        'validity_date',
        'shipper_name',
        'pod',
        'vessel',
        'voyage',
        'do_date',
        'container_size',
        'container_type',
        'sub_type',
        'container_qty',
        'remarks',
        'depo_id',
        'createdby',
        'updatedby',
    ];
}
