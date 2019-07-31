<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'name', 'detail', 'author', 'id_book'
    ];

    function booktype()
    {
        return $this->belongsTo('App\BookType', 'id_book', 'id');
    }
}
