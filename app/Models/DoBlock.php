<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoBlock extends Model
{
    use HasFactory; 
    protected $fillable = [
        'do_no',
        'status',
        'createdby',
        'updatedby',
        'depo_id'
    ];
}
