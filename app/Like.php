<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Like extends Model
{
    protected $table = 'likes';

    public function idee()
    {
        return $this->belongsTo('App\Idee','idee_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','cit_id');
    }
}
