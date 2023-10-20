<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chercheur extends Model
{
    use HasFactory;

    protected $fillable = ['CIN_CH', 'CNE_CH', 'Nom_CH', 'Prenom_CH', 'Email_CH','Date_Naiss_CH', 'Lieu_Naiss_CH', 'Id_Equipe', 'Id_Lab'];
}
