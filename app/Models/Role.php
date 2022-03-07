<?php

namespace App\Models;

use App\Models\User;
use App\Models\AdminEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public function user() {
       return $this->belongsTo(User::class);
    }

    public function adminEmail()
    {
        return $this->hasMany(AdminEmail::class);
    }
}
