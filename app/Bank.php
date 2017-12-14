<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table= 'bank_details';
    public $updated_at = false;
    public $created_at = false;
    protected $fillable= [
        'bank_name','branch_name','ifsc_code','account_no','user_id'
    ];
    
}
