<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    //
     protected $table = 'book';
    protected $fillable =[
    	'booktype'
    ];

    function post(){
    	return $this->hasMany('App\BookType', 'id_book','id');
    }
}
