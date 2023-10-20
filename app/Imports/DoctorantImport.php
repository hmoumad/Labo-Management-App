<?php

namespace App\Imports;

use App\Models\Doctorant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class DoctorantImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    /* public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    } */

    public function model(array $row)
    {
        return new Doctorant([

            'CIN_D'     => $row['cin'],
            'CNE_D'    => $row['cne'], 
            'Nom_D'    => $row['nom'], 
            'Prenom_D'    => $row['prenom'], 
            'Email_D'    => $row['email'], 
            'Date_Naiss_D'    => date('Y-m-d', strtotime(str_replace('-', '/', $row['date']))),
            'Lieu_Naiss_D'    => $row['lieu'], 
            'Id_Equipe'    => $row['equipe'], 

        ]);
    }
}
