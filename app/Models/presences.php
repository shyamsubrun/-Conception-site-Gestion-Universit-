<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presences extends Model
{
    use HasFactory;
    protected $table = 'presences';
    public $timestamps = false;

    protected $fillable = ['etudiant_id', 'seance_id'];

    public function etudiants(){
        return $this->belongsToMany(Etudiants::class,'presences','etudiant_id','seance_id');
    }

    public function seances(){
        return $this->belongsToMany(Seances::class,'presences','seance_id','etudiant_id');
    }
}
