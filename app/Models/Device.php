<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public $fillable = [
        'requesting_officer',
        'mobile',
        'machine_model',
        'serial_no',
        'nature_of_fault',
        'department',
        'date_in',
        'date_of_collection',
        'workdone',
        'workdone_by'
    ];
}
