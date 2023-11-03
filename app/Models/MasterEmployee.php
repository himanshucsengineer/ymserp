<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'employee_code',
        'contractor_id',
        'address',
        'pincode',
        'contact',
        'aadhar',
        'createdby',
        'updatedby',
        'depo_id'
    ];

}
