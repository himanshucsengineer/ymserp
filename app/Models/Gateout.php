<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gateout extends Model
{
    use HasFactory;

            protected $fillable = [
                'driver_name',
                'vehicle_number',
                'contact_number',
                'vehicle_img',
                'depo_id',
                'createdby',
                'updatedby',
                'in_date',
                'in_time'
            ];
}
