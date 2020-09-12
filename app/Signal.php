<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signal extends Model
{
    use SoftDeletes;

    protected $fillable = [];
    protected $table = 'signals';
    protected $dates = ['deleted_at'];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie','cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','cit_id');
    }

    public function wilaya()
    {
        return $this->belongsTo('App\Wilaya','wilaya_id');
    }
}
