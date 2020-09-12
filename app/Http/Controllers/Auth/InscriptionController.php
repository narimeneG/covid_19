<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InscriptionController extends Controller
{
     
    public function login(Request $request)
    {

       /* $salle_id= $request->input('salle');
       
        $activites = Activite::where('salle_id',$salle_id)->get();
     
   // return redirect('register');*/
    return view('auth.register');

         

    }



}
