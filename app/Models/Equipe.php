<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    public function Utilisateurs()
    {
        return $this->hasMany(Utilisateurs::class);
    }
}
