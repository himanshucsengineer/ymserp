<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GateIn extends Model
{
    use HasFactory;

    protected $fillable = [

        'inward_no',
        'container_no',
        'container_img',
        'vehicle_number',
        'vehicle_img',
        'inward_date',
        'inward_time',
        'survayor_date',
        'survayor_time',
        'container_type',
        'container_size',
        'sub_type',
        'gross_weight',
        'tare_weight',
        'mfg_date',
        'csc_details',
        'line_id',
        'grade',
        'status_name',
        'rftype',
        'make',
        'model_no',
        'serial_no',
        'machine_mfg_date',
        'device_status',
        'third_party',
        'consignee_id',
        'transaction_mode',
        'transaction_ref_no',
        'arrive_from',
        'transport_id',
        'driver_name',
        'contact_number',
        'vessel_name',
        'voyage',
        'port_name',
        'er_no',
        'empty_latter',
        'challan',
        'empty_repositioning',
        'return',
        'tracking_device',
        'remarks',
        'gateintype',
        'createdby',
        'updatedby',
        'depo_id',
        'is_approve',
        'is_repaired',
        'is_estimate_done',
        'estimate_updatedby',
        'estimate_updated_at',
        'repair_updatedby',
        'repair_updatedat',
        'approve_updatedby',
        'approve_updatedat',
        'status_updatedat',
        'status_updatedby',
        'status',
        'is_gate_out_checked',
        'gate_out_check_by',
        'gate_out_date',
        'reject_remark'
    ];
}
