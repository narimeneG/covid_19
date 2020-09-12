<?php

namespace App\Http\Controllers\Citoyen;

use App\Http\Controllers\Controller;
use App\Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\User;
use App\Wilaya;
use App\Commune;
use App\Maladie;
use Auth;
use Hash;
use App\Profession;
use Image;

class UserController extends Controller
{
    public function profile()
    {
        $id=Auth::user()->id;
        $user =User::Where('id',$id)->first();
        $c = User::find($id)->com_id;//DB::Table('citoyens')->select('com_id')->where('id',$id)->get();
        $w = Commune::find($c)->wilaya_id;
        $wilaya = Wilaya::find($w)->nom;
        return view('user.profile',['user'=>$user, 'wilaya'=>$wilaya]);

    }

    public function edit($id)
    {
        $id_user=Auth::user()->id;
        $user=User::find($id);
        $communes = Commune::all();
        $profs = Profession::all();
        $maladies = Maladie::all();
        $tags = Maladie::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        if($id_user == $user->id)
            
            return view('user.settings',['user'=>$user, 'communes'=>$communes, 'profs'=>$profs, 'maladies'=>$maladies, 'tags2'=>$tags2]);
    }

    public function update(Request  $request, $id)
    {
        $this->validate($request,[
            'pro_id' => 'required',
            'com_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
       
        ]);
        $id_user=Auth::user()->id;
        $user =User::find($id);
        if($id_user == $user->id){
            $user->pro_id = $request->input('pro_id');
            $user->com_id = $request->input('com_id');
            if ($request->hasFile('image'))
            {
                $file=$request->file('image');
                $img = Image::make($file);
                $e=$file->getClientOriginalExtension();
                $filename=time().'.'.$e;
                $img->resize(400,300)->save('uploads/users/'.$filename,60); 
            
                $user->image='uploads/users/'.$filename;
            }
            $user->save();
            if (isset($request->tags)) {
                $user->maladies()->sync($request->tags);
            } else {
                $user->maladies()->sync(array());
            }

            return back();    
        }
    }

    public function updat(Request  $request, $id)
    {
        $this->validate($request,[
            'nom' => 'string|min:3|max:255',
            'prenom' => 'string|min:3|max:255',
            'email' => 'required|regex:/^.+@.+$/i|unique:citoyens',
       
        ]);
        $id_user=Auth::user()->id;
        $user =User::find($id);
        if($id_user == $user->id){
            $user->nom=$request->input('nom');
            $user->prenom=$request->input('prenom');
            $user->email=$request->input('email');
            
            $user->save();
            return back();  
        }
    }

    public function updateP(Request  $request, $id)
    {
        $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
       
        ]);
        $id_user=Auth::user()->id;
        $user =User::find($id);
        if($id_user == $user->id){
            $user->password=Hash::make($request->input('password'));
            
            $user->save();
            return back();  
        }
    }
}
