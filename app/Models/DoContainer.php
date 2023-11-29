<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoContainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'line_id',
        'container_no',
        'container_size',
        'container_type',
        'sub_type',
        'vessel_name',
        'voyage',
        'status',
        'do_no',
        'depo_id',
        'createdby',
        'updatedby',
    ];
}
