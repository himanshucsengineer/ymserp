<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'interior_img',
        'under_img',
        'roof_img',
        'floor_img',
        'door_img',
        'front_img',
        'left_img',
        'right_img',
        'bottom_img',
        'top_img',
        'name',
        'alise',
        'free_days',
        'labour_rate',
        'line_address',
        'email',
        'phone',
        'mobile',
        'gst',
        'pan',
        'gst_state',
        'state_code',
        'createdby',
        'updatedby',
        'depo_id',
        'containerSize',
        'containerType',
        'line_budget',
        'parking_charges',
        'washing_charges',
        'lolo_charges',
        'tracking_device'
    ];
}
