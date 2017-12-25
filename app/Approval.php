<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $table= 'user_approval';
    public $updated_at = false;
    public $created_at = false;
    protected $fillable= [
        'user_id','parent_id ','aprroval_module'
    ];
    
}
