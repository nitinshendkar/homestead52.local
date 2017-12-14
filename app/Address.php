<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table= 'user_address';
    public $updated_at = false;
    public $created_at = false;
    protected $fillable= [
        'user_id','state_id','district_id','taluka_id','address_type','village'
    ];
    
}
