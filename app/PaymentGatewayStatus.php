<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentGatewayStatus extends Model
{
    public $updated_at = false;
    public $created_at = false;
    protected $table = 'Payment_gateway_status';
    protected $fillable= [
        'user_id','Role','transaction_id','pg_transaction_id','transaction_time','payment_status'
    ];
}
