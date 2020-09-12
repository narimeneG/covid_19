<?php

namespace App\Http\Controllers\Citoyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SignalRequest;
use Illuminate\Validation\Rule;
use App\Categorie;
use App\Signal;
use App\Wilaya;
use Auth;
use Illuminate\Support\Facades\Date;
use App\Illuminate\Http\uploadedFile;
use Image;

class SignalController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $wilayas = Wilaya::all();
        return view ('user.s',['categories' => $categories, 'wilayas' => $wilayas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignalRequest $request)
    {
        $s = new Signal();
        $s->localisation = $request->input('localisation');
        $s->cat_id = $request->input('cat_id');
        $s->wilaya_id = $request->input('wilaya_id');
        $s->localisation = $request->input('localisation');
        $s->contenu = $request->input('contenu');
        $s->date = $request->input('date');
        if ($request->hasfile('image'))
        {
            $file= $request->file('image');
            $img = Image::make($file);
            $file_name= time().'.'.$file->getClientOriginalExtension();
            $img->resize(400,300)->save('uploads/signal/'.$file_name,60); 
            $s->image= 'uploads/signal/'.$file_name;
        }
        if(Auth::user())
        {
            $s->cit_id = Auth::user()->id;
        }else{
            $s->cit_id = null;
        }
        
        $s->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
}
