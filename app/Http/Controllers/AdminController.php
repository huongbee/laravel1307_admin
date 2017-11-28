<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getIndex(){
    	return view('pages.index');
    }

    public function getListProduct(){
    	return view('pages.list-product');
    }

    public function getLogin(){
    	return view('login');
    }
}
