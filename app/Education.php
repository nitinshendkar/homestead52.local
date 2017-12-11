<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table= 'education_details';
    public $updated_at = false;
    public $created_at = false;
    protected $fillable= [
        'degree','board','percentage','specialization','year_of_passing'
    ];
}
