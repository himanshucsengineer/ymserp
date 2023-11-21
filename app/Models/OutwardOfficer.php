<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutwardOfficer extends Model
{
    use HasFactory;
            protected $fillable = [
                'do_no',
            'challan_no',
            'line_id',
            'transport_id',
            'container_type',
            'container_size',
            'sub_type',
            'grade',
            'status_name',
            'driver_name',
            'vehicle_no',
            'container_no',
            'do_copy',
            'challan_copy',
            'driver_copy',
            'consignee_id',
            'shippers',
            'licence_no',
            'licence_copy',
            'aadhar_no',
            'aadhar_copy',
            'pan_no',
            'pan_copy',
            'line_id_2',
            'seal_no',
            'depo_id',
            'createdby',
            'updatedby',
            'status',
            ];
}
