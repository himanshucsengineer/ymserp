<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterContractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'contractor_code',
        'fullname',
        'company',
        'address',
        'pincode',
        'contact',
        'license',
        'gst',
        'createdby',
        'updatedby',
        'depo_id'
    ];
}
