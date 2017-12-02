<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";

    public function Foods(){
    	return $this->belongsToMany('App\Foods','menu_detail','id_menu','id_food');
    }
}
