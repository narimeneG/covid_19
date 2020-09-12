<?php

namespace App\Http\Controllers\Citoyen;

use App\Http\Controllers\Controller;
use App\Information;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Wilaya;
use App\Commune;

class InformationController extends Controller
{
    public function index(){
        if(Auth::user()){
            $infos = DB::table('informations')
                ->join('sources', 'sources.id', '=', 'informations.sou_id')
                ->select('sources.nom', 'informations.*')
                ->where('pro_id',Auth::user()->pro_id)
                ->orderBy('date', 'desc')
                ->paginate(5);
        }else{
            $infos = Information::orderBy('date', 'desc')->paginate(5);
        }
        
        return view('user.publication',['infos' => $infos]);
    }

    
}
