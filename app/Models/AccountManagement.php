<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class AccountManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'account_no',
        'ifsc',
        'branch_name',
        'account_holder',
    ];
}
