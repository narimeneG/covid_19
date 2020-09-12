<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Idee extends Model
{
    use SoftDeletes;

    protected $fillable = [];
    protected $table = 'idées';
    protected $dates = ['deleted_at'];

    public function cat()
    {
        return $this->belongsTo('App\Categorie','cat_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function user()
    {
        return $this->belongsTo('App\User','cit_id');
    }
}
