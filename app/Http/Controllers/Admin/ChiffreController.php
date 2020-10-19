<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Chiffre;
use App\Wilaya;
use Illuminate\Http\Request;
use DB;
use Charts;

class ChiffreController extends Controller
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
        $chiffres = Chiffre::all();
        $wilayas = Wilaya::all();
        return view('admin.chiffre.chiffre',['chiffres' =>$chiffres,'wilayas' => $wilayas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c = new Chiffre();
        $c->nbrmal = $request->input('nbrmal');
        $c->nbrgue = $request->input('nbrgue');
        $c->nbrmort = $request->input('nbrmort');
        $c->date = $request->input('date');
        $c->wilaya_id = $request->input('wilaya_id');
        $c->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wilaya = Wilaya::where('id',$id)->first()->nom;
        $stats = Chiffre::where('wilaya_id', $id)->get();
        $nbrmal = DB::table('stats')->where('wilaya_id', $id)->sum('nbrmal');
        $nbrgue = DB::table('stats')->where('wilaya_id', $id)->sum('nbrgue');
        $nbrmort = DB::table('stats')->where('wilaya_id', $id)->sum('nbrmort');
        $nvcas = DB::table('stats')->select('nbrmal')->where('wilaya_id', $id)->orderBy('date','desc')->first()->nbrmal;
        $nvmort = DB::table('stats')->select('nbrmort')->where('wilaya_id', $id)->orderBy('date','desc')->first()->nbrmort;
        $nvgue = DB::table('stats')->select('nbrgue')->where('wilaya_id', $id)->orderBy('date','desc')->first()->nbrgue;
        $summal = DB::table('stats')
            ->select([DB::raw('sum(nbrmal) as totalmal'),'date'])
            ->where('wilaya_id', $id)
            ->groupBy('date')
            ->get();
        $summort = DB::table('stats')
            ->select([DB::raw('sum(nbrmort) as totalmort'),'date'])
            ->where('wilaya_id', $id)
            ->groupBy('date')
            ->get();
        $sumgue = DB::table('stats')
            ->select([DB::raw('sum(nbrgue) as totalgue'),'date'])
            ->where('wilaya_id', $id)
            ->groupBy('date')
			->get();
		$linemal = Charts::create('line', 'highcharts')
			->title("les cas par jour")
			->labels($summal->pluck('date')->all())
			->values($summal->pluck('totalmal')->all())
			->dimensions(400,400)
            ->responsive(true);
        $barmal = Charts::create('bar', 'highcharts')
			->title("les cas par jour")
			->labels($summal->pluck('date')->all())
			->values($summal->pluck('totalmal')->all())
			->dimensions(400,400)
            ->responsive(true);
        $linemort = Charts::create('line', 'highcharts')
            ->title("Les décés par jour")
            ->colors(['#d32f2f', '#d32f2f'])
			->labels($summort->pluck('date')->all())
			->values($summort->pluck('totalmort')->all())
			->dimensions(400,400)
            ->responsive(true);
        $barmort = Charts::create('bar', 'highcharts')
            ->title("Les décés par jour")
            ->colors(['#d32f2f', '#d32f2f'])
			->labels($summort->pluck('date')->all())
			->values($summort->pluck('totalmort')->all())
			->dimensions(400,400)
            ->responsive(true);
        $linegue = Charts::create('line', 'highcharts')
            ->title("Les guérison par jour")
            ->colors(['#00c853', '#00c853'])
			->labels($sumgue->pluck('date')->all())
			->values($sumgue->pluck('totalgue')->all())
			->dimensions(400,400)
            ->responsive(true);
        $bargue = Charts::create('bar', 'highcharts')
            ->title("Les guérison par jour")
            ->colors(['#00c853', '#00c853'])
			->labels($sumgue->pluck('date')->all())
			->values($sumgue->pluck('totalgue')->all())
			->dimensions(400,400)
			->responsive(true);
        return view('admin.chiffre.wilayaStat',['wilaya' => $wilaya, 'stats' => $stats, 'nbrmort' => $nbrmort, 'nbrmal' => $nbrmal, 
        'nbrgue' => $nbrgue, 'nvcas' => $nvcas, 'nvmort' => $nvmort, 'nvgue' => $nvgue, 'linemal' => $linemal, 'barmal' => $barmal, 
        'linemort' => $linemort, 'barmort' => $barmort, 'linegue' => $linegue, 'bargue' => $bargue]);
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
        $c = Chiffre::find($request->chiffre_id);
        $c->nbrmal = $request->input('nbrmal');
        $c->nbrgue = $request->input('nbrgue');
        $c->nbrmort = $request->input('nbrmort');
        $c->date = $request->input('date');
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
        $c = Chiffre::findOrFail($request->chiffre_id);
        $c->delete();

        return back();
    }
}
