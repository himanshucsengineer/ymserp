<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutwardOfficer extends Model
{
    use HasFactory;
            protected $fillable = [
                'container_no',
                'container_size',
                'container_type',
                'sub_type',
                'line_id',
                'repair_completion_date',
                'inward_date',
                'do_date',
                'transport_id',
                'vhicle_no',
                'destination',
                'seal_no',
                'third_party',
                'port_name',
                'temprature',
                'vent_seal_no',
                'ventilation',
                'humadity',
                'device_status',
                'amount',
                'depo_id',
                'createdby',
                'updatedby',
            ];
}
