<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $table = "rapports";

    protected $fillable = [
        'name_responsible',
        'email_responsible',
        'id_team',
        'description_message',
        'file_rapport'

    ];
}
