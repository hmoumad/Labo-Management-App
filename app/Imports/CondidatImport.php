<?php

namespace App\Imports;

use App\Models\Condidat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CondidatImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Condidat([
            
            'CIN_C'     => $row['cin'],
            'CNE_C'    => $row['cne'], 
            'Nom_C'    => $row['nom'], 
            'Prenom_C'    => $row['prenom'], 
            'Email_C'    => $row['email'], 
            'Date_Naiss_C'    => date('Y-m-d', strtotime(str_replace('-', '/', $row['date']))),
            'Lieu_Naiss_C'    => $row['lieu'], 
            'Note_Deug'    => $row['noted'],
            'Note_Licence'    => $row['notel'],
            'Note_Entretien'    => $row['notee'],

        ]);
    }
}
