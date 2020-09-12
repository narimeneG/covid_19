<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Maladie;
use App\Illuminate\Http\UploadedFile;
use Image;
use CitoyenMaladie;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/publication';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:citoyens'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'pro_id' => 'unique:citoyens',
            'com_id' => 'unique:citoyens',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);
    }

    public function register(UserRequest $request)
    {
        /*$this->validate($request,[
            'nom' => 'required|string|min:3|max:255',
            'prenom' =>'required|string|min:3|max:255',
            'email' => 'required|regex:/^.+@.+$/i|unique:citoyens',
            'password' => 'required|string|min:3|confirmed',
            'pro_id' => 'required',
            'com_id' => 'required',
       
        ]);*/

        $i = new User();
        $i->nom = $request->input('nom');
        $i->prenom = $request->input('prenom');
        $i->email = $request->input('email');
        $i->com_id = $request->input('com_id');
        $i->pro_id = $request->input('pro_id');
        $i->password=Hash::make($request->input('password'));
        
        /*if ($request->hasfile('image'))
        {
            $file= $request->file('image');
            $img = Image::make($file);
            $file_name= time().'.'.$file->getClientOriginalExtension();
            $img->resize(400,300)->save('uploads/users/'.$file_name,60); 
            $i->image= 'uploads/users/'.$file_name;
        }*/
        
        $i->save();
        $i->maladies()->sync($request->tags, false);
        return  redirect()->route('login');
    }
}
