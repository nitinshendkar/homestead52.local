<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageBoard extends Model
{
    protected $table= 'user_message_board';
    public $updated_at = false;
    public $created_at = false;
    protected $fillable= [
        'from_user_id','to_user_role','mesaage','is_deleted'
    ];
}
