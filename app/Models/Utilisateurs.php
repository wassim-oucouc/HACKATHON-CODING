<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateurs extends Authenticatable implements JWTSubject
{
    use HasFactory;

    Protected $fillable = ['Prenom','Nom','Email','Password','Photo','Role_id','status'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function Role()
    {
        return $this->hasOne(Role::class);
    }

    public function Equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
