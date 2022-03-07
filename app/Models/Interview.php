<?php

namespace App\Models;

use App\Models\Approve;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interview extends Model
{
    use HasFactory;

    public function approve()
    {
        return $this->belongsTo(Approve::class);
    }

}
