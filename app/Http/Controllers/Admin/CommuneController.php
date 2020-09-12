<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commune;
use App\Wilaya;

class CommuneController extends Controller
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
        $communes = Commune::all();
        $wilayas = Wilaya::all();
        return view('admin.wilayas.commune',['communes' => $communes,'wilayas' => $wilayas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c = new Commune();
        $c->nom = $request->input('nom');
        $c->wilaya_id=$request->input('wilaya_id');
        $c->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $c = Commune::find($request->commune_id);
        $c->nom = $request->input('nom');
        $c->wilaya_id = $request->input('wilaya_id');
        $c->save();
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $c = Commune::findOrFail($request->commune_id);
        $c->delete();

        return back();
    }
}
