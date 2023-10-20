<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function AddContact(Request $request){
        
        $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'email'],
            'messagee' => ['required', 'max:200']
        ]);

        $rapport = new Contact;
        $rapport->name = $request->input('name');
        $rapport->email = $request->input('email'); 
        $rapport->message = $request->input('messagee'); 

        $rapport->save();
        if($rapport){
            return redirect()->back()->with('Ajout_Contact', 'Message Has Being Sent Successffuly');
        }
    }
}
