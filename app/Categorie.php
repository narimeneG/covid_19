<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nom'];
    protected $table = 'categories';
    protected $dates = ['deleted_at'];

}
