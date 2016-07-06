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
}
