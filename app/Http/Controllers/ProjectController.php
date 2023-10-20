<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Theme;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Db;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::paginate(8);
        $themes = Theme::all();
        return view('projets.Projet', compact('projets', 'themes'));
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
        if(isset($_GET['search_name']))
        {
            $search_name = $_GET['search_name'];
            $doctorants = Db::table('projets')->where('Intitul_Projet','LIKE', '%'. $search_name . '%')->get();
            return $doctorants;
        }
        if(isset($_GET['search_domain']))
        {
            $search_domain = $_GET['search_domain'];
            $doctorants = Db::table('projets')->where('Domain_Projet','LIKE', '%'. $search_domain . '%')->get();
            return $doctorants;
        }
        
        return $doctorants;
        
        
        //return view('Doctorants.search_doctor', ['doctorants' => $doctorants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return 'All going GOooood';
        $request->validate([
            'intitule' => 'required',
            'domaine' => 'required',
            'description' => 'required',
            'imageprojet' => 'required'
        ]);

        $projet = new Projet;
        $projet->Intitul_Projet = $request->input('intitule');
        $projet->Id_Theme = $request->input('domaine');
        $projet->Description_Projet = $request->input('description');

        if($request->hasfile('imageprojet'))
        {
            $file = $request->file('imageprojet');
            //$extention->$file->getClientOriginalExtention();
            $filename = $file->getClientOriginalName();
            $destination = public_path('Profiles_Projet/') ;
            $file -> move($destination, $filename);
            $projet->Img_Projet = $filename;
        }

        $projet->save();

        if($projet){
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
        //return 'so Goooooood '. $id;
        $projet = Projet::find($id);
        return view('projets.edit_projet',['projet' =>$projet]);
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
        $request->validate([
            'intitule' => 'required',
            'domaine' => 'required',
            'description' => 'required',
            /* 'profile_projet' => 'required' */
        ]);  

        $projet = Projet::find($id);
        
        $projet->Intitul_Projet = $request->input('intitule');
        $projet->Id_Theme = $request->input('domaine');
        $projet->Description_Projet = $request->input('description');

        if($request->hasfile('image_projet'))
        {
            $file = $request->file('image_projet');
            //$extention->$file->getClientOriginalExtention();
            $filename = $file->getClientOriginalName();
            $destination = public_path('Profiles_Projet/') ;
            $file -> move($destination, $filename);
            $projet->Img_Projet = $filename;
        }

        $projet->save();

        if($projet){
            return redirect()->back()->with('data_updated', 'Data has been updated successfully');
        }else{
            return redirect()->back()->with('data_no_updated', 'something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
        //return dd('All Going Goooood');
        $projet = Projet::find($id);
        $projet->each->delete();

        if($projet){
            return back()->with('Data_Deleted', 'Data has been deleted successfully');
        }else{
            return back()->with('Data_No_Deleted', 'something went wrong');
        }
    }
}
