<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maladie extends Model
{
    protected $table = 'maladies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
    ];


    public function users()
    {
        return $this->belongsToMany('App/User', 'citoyen_maladies');
    }
}
