<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wilaya;
use App\Commune;
use App\Chiffre;
use App\Signal;

class WilayaController extends Controller
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
        $wilayas = Wilaya::all();
        return view('admin.wilayas.wilayas',compact('wilayas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $w = new Wilaya();
        $w->nom = $request->input('nom');
        $w->save();
        //Categorie::create($request->all());

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
        $w = Wilaya::find($request->wilayas_id);
        $w->nom = $request->input('nom');
        $w->save();
        /*$category = Wilaya::findOrFail($request->wilayas_id);
        $category->update($request->all());*/
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
        $w = Wilaya::findOrFail($request->wilayas_id);
        $c = Commune::where('wilaya_id',$request->wilayas_id);
        $stat = Chiffre::where('wilaya_id',$request->wilayas_id);
        $signal = Signal::where('wilaya_id',$request->wilayas_id);

        $c->delete();
        $stat->delete();
        $signal->delete();
        $w->delete();

        return back();
    }
}
