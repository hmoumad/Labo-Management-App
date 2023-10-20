<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CondidatImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Condidat;


class CondidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Condidats.condidat');
    }

    public function import(Request $request){
        
        $request->validate([
            'import_condidat' => ['required', 'mimes:xls,xlsx']
        ]);

        $file =$request->file('import_condidat');
        
        Excel::import(new CondidatImport, $file);

        return back()->with('ImportSuccess', 'Data has been imported successfully from Excel file');

    }

    public function AddColomns(Request $request){
        
        $request->validate([
            'ColomName' => 'required',
            'Cdeug' => 'required',
            'Clicence' => 'required',
            'Centretien' => 'required',
        ]);

        $Colomname = $request->input('ColomName');
        $deug = $request->input('Cdeug');
        $licence = $request->input('Clicence');
        $entretien = $request->input('Centretien');
        //return "input name is : ".$Colomname . " & deug Coefficient is ". $deug. " & licence Coefficient is ". $licence. " & entretien Coefficient is ". $entretien;
    
        $query = DB::statement("ALTER TABLE `condidats` ADD $Colomname varchar(255) 
                default ((($deug * `Note_Deug`) + ($licence * `Note_Licence`) + ($entretien * `Note_Entretien`))) ");

        $condidats = Condidat::all();
        return view('Condidats.condidatWithTable', compact('condidats'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
