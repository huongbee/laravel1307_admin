<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $table = "food_type";

    //1 loại có nhiều foods
    public function Foods(){
    	return $this->hasMany('App\Foods','id_type','id');
    } 
}
