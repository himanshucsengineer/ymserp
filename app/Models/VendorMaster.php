<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'email',
        'mob_no',
        'tin_no',
        'gst_no',
        'payment_terms',
        'payment_method',
        'account_no',
        'ifsc_code',
        'branch',
        'account_holder_name',
        'currency',
        'vendor_type',
        'credit_limit'
    ];
}
