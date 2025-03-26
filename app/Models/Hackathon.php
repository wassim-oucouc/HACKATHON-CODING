<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hackathon extends Model
{
    use HasFactory;

    Protected $fillable = ['Nom','Théme','Edition','Lieu','Organisateur_id'];

    Protected $table = "hackathon";


    public function Régle()
    {
        return $this->hasMany(Régle::class);
    }
}
