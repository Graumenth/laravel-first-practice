<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Example_model extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }
}
