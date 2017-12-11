<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proffessional extends Model
{
    protected $table= 'professional_details';
    public $updated_at = false;
    public $created_at = false;
    protected $fillable= [
        'designation','organization','current_working','joining_date','reveliving_date',''
    ];
}
