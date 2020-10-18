<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';

    public function wilayas()
    {
        return $this->belongsToMany('App\Wilaya','info_wilayas', 'info_id', 'wilaya_id');
    }

    public function source()
    {
        return $this->belongsTo('App\Source','sou_id');
    }

    public function pro()
    {
        return $this->belongsToMany('App\Profession','info_professions', 'info_id', 'pro_id');
    }

    public function maladies()
    {
        return $this->belongsToMany('App\Maladie', 'info_maladies', 'info_id', 'mal_id');
    }
}
