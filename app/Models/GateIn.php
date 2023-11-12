<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GateIn extends Model
{
    use HasFactory;

    protected $fillable = [

        'driver_photo',
        'challan',
        'driver_license',
        'do_copy',

        'aadhar',
        'pan',

        'container_no',

        'container_type',
        'container_size',
        'transport_id',
        'inward_date',

        'inward_time',
        'driver_name',
        'vehicle_number',
        'contact_number',

        'third_party',
        'line_id',
        'arrive_from',
        'port_name',
        'createdby',
        'updatedby',
        'depo_id',
        'container_img',
        'vehicle_img',
        'gateintype',
        'status'
    ];
}
