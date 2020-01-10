<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table="articles";

    public $fillable = ['name','description','image','user_id'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
