<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cours_etudiants extends Model
{
    use HasFactory;
    protected $table = 'cours_etudiants';
    public $timestamps = false;

    protected $fillable = ['cours_id', 'etudiant_id'];
}
