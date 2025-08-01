<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderIdModel extends Model
{

    protected $table = 'orders'; // Specify the table name if different

     protected $fillable = [
        'name',
        'email',
        'order_id',
        'payment_id',
        'contact',
        'amount'
        
    ];
}
