<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'amount',
        'admin_name',
        'from',
        'role_id',
        'grant_status'
    ];
}
