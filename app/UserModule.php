<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModule extends Model
{
   protected $table= 'personal_details';
   public $updated_at = false;
   public $created_at = false;
   protected $fillable= [
        'dob','doj','photo','signature','phto_type','signature_type','user_id'
    ];
}
