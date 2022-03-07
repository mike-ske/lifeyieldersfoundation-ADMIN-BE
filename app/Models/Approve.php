<?php

namespace App\Models;

use App\Models\Award;
use App\Models\Interview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Approve extends Model
{
    use HasFactory;
    
    public function award()
    {
        return $this->hasOne(Award::class);
    }

    public function interview()
    {
        return $this->hasOne(Interview::class);
    }
}
