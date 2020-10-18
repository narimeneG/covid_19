<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    protected $table = 'favoris';

    public function info()
    {
        return $this->belongsTo('App\Information','info_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','cit_id');
    }
}
