<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name','price', 'description', 'ingredients', 'available', 'category','slug','food_type','user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
