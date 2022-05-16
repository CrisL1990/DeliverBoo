<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name','customer_address', 'customer_telephone', 'date', 'total','customer_email'
    ];

    public function dishes() {
        return $this->belongsToMany('App\Dish');
    }
}