<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name','customer_address', 'customer_telephone', 'total','customer_email','user_id','cart'
    ];

    public function dishes() {
        return $this->belongsToMany('App\Dish');
    }
}