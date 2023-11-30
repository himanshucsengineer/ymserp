<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePass extends Model
{
    use HasFactory;

    protected $fillable = [
        'gate_pass_no',
        'outward_id',
        'createdby',
        'updatedby',
        'depo_id',
        'year',
        'month',
        'final_gate_pass_no',
    ];
}
