<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $table = "projets";
    protected $fillable = [
        'Intitul_Projet',
        'Domain_Projet',
        'Description_Projet',
        'Img_Projet'

    ];
}
