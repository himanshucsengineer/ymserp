<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutwardOfficer extends Model
{
    use HasFactory;
            protected $fillable = [
                'gate_in_id',
                'pre_advice_id',
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
                'driver_contact',
                'device_status',
                'amount',
                'do_copy',
                'challan_copy',
                'challan_no',
                'driver_name',
                'driver_copy',
                'consignee_id',
                'licence_no',
                'licence_copy',
                'aadhar_no',
                'aadhar_copy',
                'pan_no',
                'pan_copy',
                'depo_id',
                'createdby',
                'updatedby',
            ];
}
