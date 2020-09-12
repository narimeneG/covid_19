<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Illuminate\Http\UploadedFile;
use Auth;
use Hash;
use App\Admin;
use DB;
use Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin.admin',compact('admins'));

    }

    public function show($id)
    {
        //$user->with('maladies')->get();
        $admin = Admin::find($id);
        return view('admin.admin.profile',['admin' => $admin]);
    }

    public function  store(Request $request)
    {
        $this->validate($request,[
            'nom' => 'string|min:3|max:255',
            'prenom' => 'string|min:3|max:255',
            'email' => 'regex:/^.+@.+$/i',
            'username' => 'string|max:255',
            'job' => 'string|min:3|max:255',
            'password' => 'string|min:6|confirmed',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
       
        ]);
        $admin = new Admin();
 
        $admin->nom=$request->input('nom');
        $admin->prenom=$request->input('prenom');
        $admin->job=$request->input('job');
        $admin->email=$request->input('email');
        $admin->username=$request->input('username');
        $admin->password=Hash::make($request->input('password')); 
        
        
        $admin->save();
        return back();
    }


    public function profile()
    {
        $id=Auth::user()->id;
        $admin =Admin::Where('id',$id)->first();
        return view('admin.admin.profile',['admin'=>$admin]);

    }

    public function edit($id)
    {
        $id_admin=Auth::user()->id;
        $admin=Admin::find($id);
        if($id_admin == $admin->id)
        
        return view('admin.admin.settings',['admin'=>$admin]);
    }

    public function update(Request  $request, $id)
    {
        $this->validate($request,[
            'job' => 'string|min:3|max:255',
            'username' => 'string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
       
        ]);
        $id_admin=Auth::user()->id;
        $admin =Admin::find($id);
        if($id_admin == $admin->id){
            $admin->username=$request->input('username');
            $admin->job=$request->input('job');
            if ($request->hasFile('image'))
            {
                $file=$request->file('image');
                $img = Image::make($file);
                $e=$file->getClientOriginalExtension();
                $filename=time().'.'.$e;
                $img->resize(400,300)->save('uploads/admin/'.$filename,60); 
            
                $admin->image='uploads/admin/'.$filename;
            }
            $admin->save();
            
            return back();    
        }
    }

    public function updat(Request  $request, $id)
    {
        $this->validate($request,[
            'nom' => 'string|min:3|max:255',
            'prenom' => 'string|min:3|max:255',
            'email' => 'regex:/^.+@.+$/i',
       
        ]);
        $id_admin=Auth::user()->id;
        $admin =Admin::find($id);
        if($id_admin == $admin->id){
 
            $admin->nom=$request->input('nom');
            $admin->prenom=$request->input('prenom');
            $admin->email=$request->input('email');
            
            $admin->save();
            return back();  
        }
    }

    public function updateP(Request  $request, $id)
    {
        $this->validate($request,[
            'password' => 'string|min:6|confirmed',
       
        ]);
        $id_admin=Auth::user()->id;
        $admin =Admin::find($id);
        if($id_admin == $admin->id){
            $admin->password=Hash::make($request->input('password'));
            
            $admin->save();
            return back();  
        }
    }

    public function destroy(Request $request)
    {
        $admin = Admin::findOrFail($request->admin_id);

        $admin->delete();

        return back();
    }
}
