<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    use HasFactory;

    protected $fillable = [
        'to',
        'from',
        'subject',
        'body',
        'admin_id',
        'role_id'
    ];
}
