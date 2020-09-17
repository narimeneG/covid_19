<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Information;
use Illuminate\Http\Request;
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
        return view ('admin.pub.information',['infos' => $infos,'maladies' => $maladies,'professions' => $professions,'wilayas' => $wilayas,'sources' => $sources]);
    }

    public function store(Request $request)
    {
         $information=new Information();
         $information->titre=$request->input('titre');
         $information->contenu=$request->input('contenu');
         $information->lien=$request->input('lien');
         $information->sou_id=$request->input('sou_id');
         $information->mal_id=$request->input('mal_id');
         $information->wilaya_id=$request->input('wilaya_id');
         $information->pro_id=$request->input('pro_id');
         $information->date=$request->input('date');

              if($request->hasFile('image')){
          
            $file= $request->file('image');
            $img = Image::make($file);
            $file_name= time().'.'.$file->getClientOriginalExtension();
            $img->resize(400,300)->save('uploads/idees/'.$file_name,60); 
            $information->image= 'uploads/idees/'.$file_name;
        }
        
        $information->save();
        return back();
    }
    function show($id)
    {
        $info = Information::find($id);
        return view('admin.pub.showPub',['info' => $info]);
    }
    public function update(Request $request)
{
     $info_id = $request->input('information_id');
     $information = Information::find($info_id);
     $information->titre=$request->input('titre');
     $information->contenu=$request->input('contenu');
     $information->lien=$request->input('lien');
    
     $information->sou_id=$request->input('sou_id');
     $information->mal_id=$request->input('mal_id');
     $information->wilaya_id=$request->input('wil_id');
     $information->pro_id=$request->input('pro_id');
     $information->date=$request->input('date');

    $info->save();
    return redirect('admin/info');
}
}
