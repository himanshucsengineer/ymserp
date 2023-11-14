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
                'status'
            ];
}
