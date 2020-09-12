<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Wilaya;
use App\Commune;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view ('admin.abonne.utilisateur',['users'=> $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user->with('maladies')->get();
        $user = User::find($id);
        $c = User::find($id)->com_id;//DB::Table('citoyens')->select('com_id')->where('id',$id)->get();
        $w = Commune::find($c)->wilaya_id;
        $wilaya = Wilaya::find($w)->nom;
        return view('admin.abonne.profileU',['user' => $user, 'wilaya' => $wilaya]);
    }
}
