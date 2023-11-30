<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDepo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'status',
        'phone',
        'email',
        'tan',
        'pan',
        'service_tax',
        'vattin',
        'gst',
        'state',
        'state_code',
        'billing_name',
        'created_by',
        'updated_by',
        'depo_id',
        'company_name',
        'company_address',
        'company_phone',
        'company_email',
        'invoice_prefix'
    ];
}
