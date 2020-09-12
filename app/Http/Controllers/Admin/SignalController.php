<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SignalRequest;
use Illuminate\Validation\Rule;
use App\Categorie;
use App\Signal;
use App\Wilaya;
use Illuminate\Support\Facades\Date;
use DB;

class SignalController extends Controller
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
        $signals = Signal::all();
        $categories = Categorie::all();
        $wilayas = Wilaya::all();
        return view ('admin.signal.signal',['signals' => $signals, 'categories' => $categories, 'wilayas' => $wilayas]);
    }

    public function accepter(Request $request)
    {
        $signal_id = $request->signal_id;
        $accepté = $request->accepté;

        $s = DB::table('signals')
            ->where('id',$signal_id)
            ->first();

        if($s->etat == 'nouveau'){
            DB::table('signals')
                ->where('id',$signal_id)
                ->update(['etat' => 'accepté']);
            $acpt = 1;
        }
        if($s->etat == 'réfusé'){
            DB::table('signals')
                ->where('id',$signal_id)
                ->update(['etat' => 'accepté']);
            $acpt = 1;
        }
        
        $response = array(
            'acpt' => $acpt,
        );
        return response()->json($response, 200);
    }

    public function refuser(Request $request)
    {
        $signal_id = $request->signal_id;
        $réfusé = $request->réfusé;

        $s = DB::table('signals')
            ->where('id',$signal_id)
            ->first();

        if($s->etat == 'nouveau'){
            DB::table('signals')
                ->where('id',$signal_id)
                ->update(['etat' => 'réfusé']);
            $réfus = 1;
        }
        
        $response = array(
            'réfus' => $réfus,
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
        $signal = Signal::find($id);
        return view('admin.signal.showS',['signal' => $signal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SignalRequest $request)
    {
        $s = Signal::find($request->signal_id);
        $s->wilaya_id = $request->input('wilaya_id');
        $s->localisation = $request->input('localisation');
        $s->contenu = $request->input('contenu');
        $s->cat_id = $request->input('cat_id');
        $s->save();
        
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
        $s = Signal::findOrFail($request->signal_id);
        $s->delete();

        return back();
    }
}
