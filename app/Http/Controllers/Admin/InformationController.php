<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Information;
use Illuminate\Http\Request;
use App\Wilaya;
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
        return view ('admin.pub.information',['infos' => $infos]);
    }

    function show($id)
    {
        $info = Information::find($id);
        return view('admin.pub.showPub',['info' => $info]);
    }
}
