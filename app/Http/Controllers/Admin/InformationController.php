<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Information;
use Illuminate\Http\Request;
use App\Http\Requests\InformationRequest;
use Illuminate\Validation\Rule;
use App\Wilaya;
use App\Maladie;
use App\Profession;
use App\Source;
use DB;
use Response;
use Input;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $infos = Information::all();
        $maladies = Maladie::all();
        $professions = Profession::all();
        $wilayas = Wilaya::all();
        $sources = Source::all();
        return view ('admin.pub.info',['infos' => $infos,'maladies' => $maladies,'professions' => $professions,'wilayas' => $wilayas,'sources' => $sources]);
    }

    public function store(Request $request)
    {
         $information=new Information();
         $information->titre=$request->input('titre');
         $information->contenu=$request->input('contenu');
         $information->lien=$request->input('lien');
         $information->sou_id=$request->input('sou_id');
         $information->date=$request->input('date');

              if($request->hasFile('image')){
          
            $file= $request->file('image');
            $img = Image::make($file);
            $file_name= time().'.'.$file->getClientOriginalExtension();
            $img->resize(400,300)->save('uploads/idees/'.$file_name,60); 
            $information->image= 'uploads/idees/'.$file_name;
        }
        
        $information->save();
        $information->wilayas()->sync($request->wilaya_id, false);
        $information->maladies()->sync($request->mal_id, false);
        $information->pro()->sync($request->pro_id, false);
        return back();
    }

    function show($id)
    {
        $info = Information::find($id);
        return view('admin.pub.showPub',['info' => $info]);
    }

    public function edit($id)
    {
        $info = Information::find($id);
        $wilayas = Wilaya::all();
        $professions = Profession::all();
        $maladies = Maladie::all();
        $sources = Source::all();
        $tags = Maladie::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
            
        return view('admin.pub.edit',['info'=>$info, 'wilayas'=>$wilayas, 'professions'=>$professions, 'maladies'=>$maladies, 'sources'=>$sources, 'tags2'=>$tags2]);
    }

    public function update(Request $request, $id)
    {
        $i = Information::find($id);
        $i->titre=$request->input('titre');
        $i->contenu=$request->input('contenu');
        $i->lien=$request->input('lien');
        $i->sou_id=$request->input('sou_id');
        $i->date=$request->input('date');

        $i->save();
        if (isset($request->mal_id)) {
            $i->maladies()->sync($request->mal_id);
        } else {
            $i->maladies()->sync(array());
        }
        if (isset($request->wilaya_id)) {
            $i->wilayas()->sync($request->wilaya_id);
        } else {
            $i->wilayas()->sync(array());
        }
        if (isset($request->pro_id)) {
            $i->pro()->sync($request->pro_id);
        } else {
            $i->pro()->sync(array());
        }
        return redirect('admin/info');
    }

    public function infoSource($id)
    {
        $infos = Information::where('sou_id',$id)->get();
        $sources = Source::all();
        $nbr = Information::where('sou_id',$id)->count();
        $s = DB::table('sources')->where('id',$id)->first()->nom; 
        $maladies = Maladie::all();
        $professions = Profession::all();
        $wilayas = Wilaya::all();
        return view('admin.pub.infoSource',['infos' => $infos,'sources' => $sources,'maladies' => $maladies,'professions' => $professions,'wilayas' => $wilayas,'nbr' => $nbr,'s' => $s]);
    }

    

    public function destroy(Request $request)
    {
        $i = Information::findOrFail($request->info_id);
        $i->delete();

        return back();
    }
}
