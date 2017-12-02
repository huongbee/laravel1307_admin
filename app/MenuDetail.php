<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{
    protected $table = "menu_detail";

    public function Foods(){
    	return $this->belongsTo('App\Foods','id_food','id');
    }
}
