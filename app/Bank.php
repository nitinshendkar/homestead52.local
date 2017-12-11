<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table= 'bank_details';
    public $updated_at = false;
    public $created_at = false;
    protected $fillable= [
        'designation','organization','current_working','joining_date','reveliving_date'
    ];
    
}
