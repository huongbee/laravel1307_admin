<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    protected $table = "foods";

    public $timestamps = false;

    // 1 foods thuộc về 1 loại
    public function FoodType(){
    	return $this->belongsTo('App\FoodType','id_type','id');
    }
    

    public function MenuDetail(){
    	return $this->hasMany('App\MenuDetail','id_food','id');
    }

    public function PageUrl(){
    	return $this->hasOne('App\PageUrl','id','id_url');
    }

    public function Menu(){
    	return $this->belongsToMany('App\Menu','menu_detail','id_food','id_menu');
    }
}
