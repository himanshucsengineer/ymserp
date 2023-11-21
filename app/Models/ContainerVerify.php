<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerVerify extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_name',
        'job_work_no',
        'gross_weight',
        'tare_weight',
        'vessel_name',
        'grade',
        'sub_lease_unity',
        'voyage',
        'consignee',
        'region',
        'destuffung',
        'rftype',
        'empty_repositioning',
        'er_no',
        'remarks',
        'createdby',
        'depo_id',
        'gate_in_id',
        'survayor_date',
        'survayor_time',
        'mfg_date',
     ];
}
