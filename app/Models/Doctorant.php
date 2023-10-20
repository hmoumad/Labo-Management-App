<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorant extends Model
{
    use HasFactory;
    protected $fillable = [
        'CIN_D', 
        'CNE_D', 
        'Nom_D', 
        'Prenom_D', 
        'Email_D',              
        'Date_Naiss_D', 
        'Lieu_Naiss_D',
        'Id_Equipe', 
        'Id_Projet'
    ];
}
