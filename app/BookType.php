<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    //
     protected $table = 'books';
    protected $fillable =[
    	'booktype'
    ];
}
