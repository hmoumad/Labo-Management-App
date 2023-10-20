<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condidat extends Model
{
    use HasFactory;
    protected $table = "condidats";
    protected $fillable = [
        'CIN_C', 
        'CNE_C', 
        'Nom_C', 
        'Prenom_C', 
        'Email_C', 
        'Date_Naiss_C', 
        'Lieu_Naiss_C', 
        'Note_Deug', 
        'Note_Licence', 
        'Note_Entretien'
    ];
}
