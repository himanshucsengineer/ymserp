<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTI extends Model
{
    use HasFactory;

    protected $fillable = [
        'party_name',
        'container_no',
        'size_type',
        'transporter_name',
        'vehicle_no',
        'survey_place',
        'survey_date',
        'pti_date',
        'set_temprature',
        'partlow',
        'length_460_cable',
        'machine_checking',
        'supply_temp',
        'return_temp',
        'iso_plug',
        'container_fit',
        'washing_carrid',
        'createdby',
        'updatedby',
        'depo_id'
    ];
}
