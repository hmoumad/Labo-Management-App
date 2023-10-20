<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapport;
use Auth;

class UserController extends Controller
{
    public function index(){
        return view('SimpleUser/UserHome');
    }

    public function UserLogin(){
        return view('Auth/UserLogin');
    }

    public function CheckUserLogin(Request $request){

        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:4'
        ]);

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('simple.user.Home');
        }
        return back()->with('Error', 'UserName Or PassWord Is Incorrect')->withInput($request->only('email', 'remember'));

    }

    public function AddRapport(){
        return view('SimpleUser.Rapport');
    }

    public function TraitementAddRapport(Request $request){

        $request->validate([
            'name_responsible' => ['required', 'max:30'],
            'email_responsible' => ['required', 'email', 'unique:rapports'],
            'team' => ['required'],
            'description_message' => ['required', 'max:200'],
            'file_rapport' => ['required', 'mimes:pdf']
        ]);

        $rapport = new Rapport;
        $rapport->name_responsible = $request->input('name_responsible');
        $rapport->email_responsible = $request->input('email_responsible'); 
        $rapport->id_team = $request->input('team'); 
        $rapport->description_message = $request->input('description_message'); 

        if($request->hasfile('file_rapport')){
            
            $file = $request->file('file_rapport');
            $filename = $file->getClientOriginalName();
            $destination = public_path('Rapports/') ;
            $file -> move($destination, $filename);
            $rapport->file_rapport = $filename;
        }
        $rapport->save();

        if($rapport){
            return redirect()->back()->with('Ajout_Rapport', 'Rapport has been inserted successfully');
        }else{
            return redirect()->back()->with('No_Ajout_Rapport', 'something went wrong');
        }

    }

    public function ContactUs(){
        return view('SimpleUser.ContactUs');
    }
}
