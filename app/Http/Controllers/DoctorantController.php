<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DoctorantImport;

use App\Models\Doctorant;


class DoctorantController extends Controller
{

    //methode to import excel file and insert all data to our database
    public function import(Request $request)
    {
        $request->validate([
            'import_excel' => ['required', 'mimes:xls,xlsx']
        ]);

        $file =$request->file('import_excel');
        
        Excel::import(new DoctorantImport, $file);

        return back()->with('ImportSuccess', 'Data has been imported successfully from Excel file');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorants = Doctorant::paginate(10);
        return view('Doctorants.doctorant', compact('doctorants'));
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
    public function search(Request $request)
    {
        $search_text = $_GET['searchid'];
        //return $search_text ;
        $doctorants = Db::table('doctorants')->where('Prenom_D','LIKE', '%'. $search_text . '%')->get();
        //return $doctorants;
        return view('Doctorants.search_doctor', ['doctorants' => $doctorants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // to add or creat new element
        $request->validate([
            
            'CIN' => 'required', 'CNE' => 'required',
            'nom' => 'required', 'prenom' => 'required',
            'datenaiss' => 'required', 'liuenaiss' => 'required',
            'Email_D' => ['required', 'email', 'unique:doctorants'],
            'equipe' => 'required'
        ]);

        $doctorant = new Doctorant([

            'CIN_D' => $request->input('CIN'),
            'CNE_D' => $request->input('CNE'),
            'Nom_D' => $request->input('nom'),
            'Prenom_D' => $request->input('prenom'),
            'Date_Naiss_D' => $request->input('datenaiss'),
            'Lieu_Naiss_D' => $request->input('liuenaiss'),
            'Email_D' => $request->input('Email_D'),
            'Id_Equipe' => $request->input('equipe'),

        ]);
        $doctorant->save();

        if($doctorant){
            return back()->with('success', 'Data has been inserted successfully');
        }else{
            return back()->with('fail', 'something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctorant = Doctorant::find($id);
        //return $doctorant;
        return view('Doctorants.edit_doctor',['doctorant'=> $doctorant]);
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
        //return 'all going Goooood'. $id;

        $request->validate([
            
            'CIN' => 'required', 'CNE' => 'required',
            'nom' => 'required', 'prenom' => 'required',
            'datenaiss' => 'required', 'liuenaiss' => 'required',
            'Email_D' => ['required', 'email'],
            'equipe' => 'required'

        ]);

        $doctorant = Doctorant::find($request->id);
        $doctorant->CIN_D = $request -> CIN;
        $doctorant->CNE_D = $request -> CNE;
        $doctorant->Nom_D = $request -> nom;
        $doctorant->Prenom_D = $request -> prenom;
        $doctorant->Email_D = $request -> Email_D;
        $doctorant->Date_Naiss_D = $request -> datenaiss;
        $doctorant->Lieu_Naiss_D = $request -> liuenaiss;
        $doctorant->Id_Equipe = $request -> equipe;
        

        //return $doctorant;
        $doctorant->save();
        return redirect('doctorant');

        if($doctorant){
            return back()->with('success2', 'Data has been inserted successfully');
        }else{
            return back()->with('fail2', 'something went wrong');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $id)
    {
        $doctorant = Doctorant::find($id);
        $doctorant->each->delete();


        if($doctorant){
            return back()->with('success1', 'Data has been deleted successfully');
        }else{
            return back()->with('fail1', 'something went wrong');
        }
    }
}
