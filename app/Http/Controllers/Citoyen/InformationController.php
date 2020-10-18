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
use App\Favori;

class InformationController extends Controller
{
    public function index(){
        if(Auth::user()){
            

            $infos = DB::table('informations')
                
                ->join('info_wilayas', function($join)
                {
                    $id_c = Auth::user()->com_id;
                    $w = Commune::find($id_c)->wilaya_id;
                    $w_id = Wilaya::find($w)->id;
                    $join->on('informations.id', '=', 'info_wilayas.info_id')
                    ->where('info_wilayas.wilaya_id',$w_id);

                })
                /*->join('info_professions', function($join)
                {
                    $join->on('informations.id', '=', 'info_professions.info_id')
                    ->where('info_professions.pro_id',Auth::user()->pro_id);

                })*/
                ->select( 'informations.*')
                ->orderBy('date', 'desc')
                ->paginate(5);
            /*DB::table('informations')
                ->join('info_professions', 'info_professions.info_id', '=', 'informations.id')
                ->select('info_professions.pro_id as prof_id', 'informations.*')
                ->where('prof_id',Auth::user()->pro_id)
                ->orderBy('date', 'desc')
                ->paginate(5);*/
        }else{
            $infos = Information::orderBy('date', 'desc')->paginate(5);
        }
        
        return view('user.publication',['infos' => $infos]);
    }

    public function favoris(Request $request)
    {
        $favoris_s = $request->favoris_s;
        $info_id = $request->info_id;

        $favoris = DB::table('favoris')
            ->where('info_id',$info_id)
            ->where('cit_id',Auth::user()->id)
            ->first();

        if(!$favoris){
            $new_favoris = new Favori();
            $new_favoris->info_id = $info_id;
            $new_favoris->cit_id = Auth::user()->id;
            $new_favoris->date =  date("Y-m-d H:i:s");
            $new_favoris->save();

            $is_favoris = 1;

        }else{
            DB::table('favoris')
                ->where('info_id',$info_id)
                ->where('cit_id',Auth::user()->id)
                ->delete();

            $is_favoris = 0;
        }

        $response = array(
            'is_favoris' => $is_favoris,
        );
        return response()->json($response, 200);
    }
    
}
