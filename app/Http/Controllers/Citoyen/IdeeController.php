<?php

namespace App\Http\Controllers\Citoyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IdeeRequest;
use Illuminate\Validation\Rule;
use App\Illuminate\Http\uploadedFile;
use Auth;
use App\Idee;
use App\Categorie;
use App\Like;
use DB;
use Image;

class IdeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idees = Idee::Where('etat',1)->orderBy('date', 'desc')->paginate(5);
        $categories = Categorie::all();
        return view ('user.idée',['idees'=> $idees,'categories' => $categories]);
    }

    public function c($id)
    {
        $idees = Idee::find($id);
        $idees->etat = 1;
        $idees->save();
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdeeRequest $request)
    {
        /*$this->validate($request,[
            'titre' => 'required|string|min:3|max:255',
            'contenu' =>'required|string|',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
       
        ]);*/

        $i = new Idee();
        $i->titre = $request->input('titre');
        $i->cat_id = $request->input('cat_id');
        $i->contenu = $request->input('contenu');
        $i->date = date('Y-m-d');
        
        if(Auth::user())
        {
            $i->cit_id = Auth::user()->id;
        }
        if ($request->hasfile('image'))
        {
            $file= $request->file('image');
            $img = Image::make($file);
            $file_name= time().'.'.$file->getClientOriginalExtension();
            $img->resize(400,300)->save('uploads/idée/'.$file_name,60); 
            $i->image= 'uploads/idée/'.$file_name;
        }
        
        $i->save();
        return back();
    }

    public function like(Request $request)
    {
        $like_s = $request->like_s;
        $idee_id = $request->idee_id;
        $change_like = 0;

        $like = DB::table('likes')
            ->where('idee_id',$idee_id)
            ->where('cit_id',Auth::user()->id)
            ->first();

        if(!$like){
            $new_like = new Like();
            $new_like->idee_id = $idee_id;
            $new_like->cit_id = Auth::user()->id;
            $new_like->like = 1;
            $new_like->save();

            $is_like = 1;

        }elseif ($like->like == 1){
            DB::table('likes')
                ->where('idee_id',$idee_id)
                ->where('cit_id',Auth::user()->id)
                ->delete();

            $is_like = 0;

        }elseif ($like->like == 0){
            DB::table('likes')
                ->where('idee_id',$idee_id)
                ->where('cit_id',Auth::user()->id)
                ->update(['like' => 1]);

            $is_like = 1;
            $change_like = 1;
        }

        $response = array(
            'is_like' => $is_like,
            'change_like' => $change_like,
        );
        return response()->json($response, 200);
    }

    public function dislike(Request $request)
    {
        $dislike_s = $request->dislike_s;
        $idee_id = $request->idee_id;
        $change_dislike = 0;

        $dislike = DB::table('likes')
            ->where('idee_id',$idee_id)
            ->where('cit_id',Auth::user()->id)
            ->first();

        if(!$dislike){
            $new_dislike = new Like();
            $new_dislike->idee_id = $idee_id;
            $new_dislike->cit_id = Auth::user()->id;
            $new_dislike->like = 0;
            $new_dislike->save();

            $is_dislike = 1;

        }elseif ($dislike->like == 0){
            DB::table('likes')
                ->where('idee_id',$idee_id)
                ->where('cit_id',Auth::user()->id)
                ->delete();

            $is_dislike = 0;

        }elseif ($dislike->like == 1){
            DB::table('likes')
                ->where('idee_id',$idee_id)
                ->where('cit_id',Auth::user()->id)
                ->update(['like' => 0]);

            $is_dislike = 1;
            $change_dislike = 1;

        }

        $response = array(
            'is_dislike' => $is_dislike,
            'change_dislike' => $change_dislike,
        );
        return response()->json($response, 200);
    }
    
}
