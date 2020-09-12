<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';

    public function wilaya()
    {
        return $this->belongsTo('App\Wilaya','wilaya_id');
    }

    public function source()
    {
        return $this->belongsTo('App\Source','sou_id');
    }

    public function pro()
    {
        return $this->belongsTo('App\Profession','pro_id');
    }

    public function maladie()
    {
        return $this->belongsTo('App\Maladie','mal_id');
    }
}
