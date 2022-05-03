<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $fillable = [
        'surname',
        'first_name',
        'gender',
        'email_address',
        'phone_number',
        'residential_address',
        'state_of_origin',
        'nationality',
        'school',
        'course_of_study',
        'programme',
        'start_duration',
        'end_duration',
    ];
}
