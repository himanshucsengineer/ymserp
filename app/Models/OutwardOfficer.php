<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutwardOfficer extends Model
{
    use HasFactory;
            protected $fillable = [
                'gate_in_id',
                'gate_out_id',
                'Transporter_name',
                'destination',
                'shippers',
                'vessel',
                'voyage',
                'port_name',
                'seal_no',
                'vent_seal_no',
                'temprature',
                'receipt_no',
                'cash',
                'remark',
                'depo_id',
                'createdby',
                'updatedby',
                'status',
                'do_number',
                'driver_license',
                'driver_aadhar',
                'do_image',
                'driver_license_image',
                'driver_aadhar_image'
            ];
}
