<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Régle extends Model
{
    use HasFactory;

    public function Hackathon()
    {
        return $this->hasMany(Hackathon::class);
    }
}

