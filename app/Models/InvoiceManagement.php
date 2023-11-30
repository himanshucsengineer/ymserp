<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceManagement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'invoice_no',
        'gate_in_id',
        'invoice_type',
        'payment_method',
        'createdby',
        'updatedby',
        'depo_id',
        'year',
        'month',
        'final_invoice_no',
        'third_party',
        'is_manual',
    ];
    
    
}
