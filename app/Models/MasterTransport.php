<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTransport extends Model
{
    use HasFactory;

    protected $fillable = [
       'transport_id',
        'name',
        'address',
        'city',
        'state',
        'pincode',
        'gst',
        'pan',
        'gst_state',
        'state_code',
        'is_transport',
        'createdby',
        'updatedby',
        'depo_id'
    ];
}
