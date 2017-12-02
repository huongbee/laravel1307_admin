<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageUrl extends Model
{
    protected $table = "page_url";

    public function Foods(){
    	return $this->hasOne('App\Foods','id_url','id');
    }
}
