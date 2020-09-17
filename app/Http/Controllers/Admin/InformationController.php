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

    function show($id)
    {
        $info = Information::find($id);
        return view('admin.pub.showPub',['info' => $info]);
    }
}
