<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public $created_at = false;
    protected $fillable= [
        'title',
        'author_id',
        'description'
    ];

    public function authors()
    {
        return $this->belongsTo('App\author');
    }
}
