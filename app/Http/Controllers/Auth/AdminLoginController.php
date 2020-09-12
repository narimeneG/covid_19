<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Route;

class AdminLoginController extends Controller
{

    /*use AuthenticatesUsers;

    protected $redirectTo = '/statistique'; */

    public function __construct()
    {
        $this->middleware('guest:admin',['except' =>['logout']]);//->except('logout');
    }

    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
 
        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=> $request->password], $request->remember)) {
      	   return redirect()->intended(route('admin'));
        }
          
         return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        
        return redirect('/admin/login');
    }
}
