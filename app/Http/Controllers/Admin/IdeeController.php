<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IdeeRequest;
use Illuminate\Validation\Rule;
use App\Illuminate\Http\uploadedFile;
use App\Idee;
use App\Categorie;
use DB;
use Image;
use Illuminate\Support\Facades\DB as IlluminateDB;

class IdeeController extends Controller
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
        $idees = Idee::all();
        $categories = Categorie::all();
        return view('admin.idée.idée',['idees' => $idees,'categories' => $categories]);
    }

    public function accepte(Request $request)
    {
        $idee_id = $request->idee_id;
        $etat = $request->etat;

        $eta = DB::table('idées')
            ->where('id',$idee_id)
            ->first();

        if($eta->etat == 0){
            DB::table('idées')
                ->where('id',$idee_id)
                ->update(['etat' => 1]);
            $e = 1;
        }
        

        $response = array(
            'e' => $e,
        );
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idee = Idee::find($id);
        return view('admin.idée.showID',['idee' => $idee]);
    }

    public function cateID($id)
    {
        $idees = Idee::where('cat_id',$id)->get();
        $categories = Categorie::all();
        $nbr = Idee::where('cat_id',$id)->count();
        $cat = DB::table('categories')->where('id',$id)->first()->nom;
        
        return view('admin.idée.cateID',['idees' => $idees,'categories' => $categories,'nbr' => $nbr,'cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IdeeRequest $request)
    {
        $i = Idee::find($request->idee_id);
        $i->titre = $request->input('titre');
        $i->contenu = $request->input('contenu');
        $i->cat_id = $request->input('cat_id');
        $i->save();
        
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
        $i = Idee::findOrFail($request->idee_id);
        $i->delete();

        return back();
    }
}
