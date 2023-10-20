<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;

use App\Models\Rapport;
use Auth;

class ChefEquipeController extends Controller
{
    public function index()
    {
        return view('Chef_Equipe.ChefEquipeHome');
    }

    public function LoginChef()
    {
        return view('auth.ChefEquipeLogin');
    }

    public function CheckChefLogin(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:4'
        ]);

        if (Auth::guard('chefequipe')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('chef.equipe.Home');
        }
        return back()->with('Error', 'UserName Or PassWord Is Incorrect')->withInput($request->only('email', 'remember'));
    }

    public function GestionRapport(){
        $rapport = Rapport::all();
        return view('Chef_Equipe.GestionRapport', compact('rapport'));
    }
    
    public function ViewRapport($id){
        $rapport = Rapport::find($id);
        return view('Chef_Equipe.ShowRapport', compact('rapport'));
    }

    public function DownloadRapport(Request $request, $file){

        return response()->download(public_path('Rapports/'. $file));
    }

    public function DeleteRapport(Request $id){
        
        $rapport = Rapport::find($id);
        $rapport->each->delete();

        if($rapport){
            return redirect()->back()->with('Delete_Rapport', 'Rappport has been deleted successfully');
        }else{
            return redirect()->back()->with('fail_Delete_Rapport', 'something went wrong');
        }
    }
}
