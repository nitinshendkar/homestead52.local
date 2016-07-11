<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $updated_at = false;
    public $created_at = false;
    protected $table = 'authors';
    protected $fillable= [
        'name'
    ];

    public function books()
    {
        return $this->hasMany('App\book');
    }

//    function save($id){
//        $author = App\Author::find($id);
//        $user->authors()->associate($author);
//        $user->save();
//    }
}
