<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiants extends Model
{
    use HasFactory;

    public function cours(){
        return $this->belongsToMany(cours::class,'cours_etudiants','etudiant_id','cours_id');
    }

    public function seances(){
        return $this->belongsToMany(Seances::class,'presences','etudiant_id','seance_id');
    }
}
