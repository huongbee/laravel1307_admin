<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
//use Illuminate\Support\Facades\Hash;
use Auth;
use App\Menu;

class AdminController extends Controller
{
    public function getIndex(){
        
        $data = Menu::with('Foods')->get();
        foreach($data as $menu){
            echo "<h3>".$menu->name."</h3>";
            echo "<br>";
            foreach($menu->Foods as $monan) {
                echo "- ".$monan->name;
                echo "<br>";
            }
            echo "<hr>";
        }
        die;
    	return view('pages.index');
    }

    public function getListProduct(){
    	return view('pages.list-product');
    }

    public function getLogin(){
        if(Auth::check()){
            return redirect()->route('homepage');
            //return view('pages.index');
        }
    	return view('login');
    }

    function getRegister(){
    	return view('register');
    }

    public function postRegister(Request $req){

        //validate
        $req->validate([
            'username'=>'required|min:10|max:50',

        ],[
            'username.min'=>'Username ít nhất :min kí tự',

        ]);


    	$user = new User;
        $user->username = $req->username;
        $user->password = Hash::make($req->password);
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->birthdate = date('Y-m-d',strtotime($req->birthdate));
        $user->address = $req->address;
        $user->gender = $req->gender;
        $user->phone = $req->phone;
        $user->status = 0;
        $user->save();

        return redirect()->route('login');
        //dd($user);

    }

    public function postLogin(Request $req){
        //validate
        $req->validate([
           // 'username'=>'required|min:10|max:50',

        ],[
            //'username.min'=>'Username ít nhất :min kí tự',

        ]);

        $info = [
            'email'=>$req->inputEmail,
            'password'=>$req->inputPassword
        ];
        $remember = 1;
        if(Auth::attempt($info,$remember)){
            //echo "Login thành công";
            return redirect()->route('homepage');
        }
        else{
            return redirect()->route('login');
        }
        //die;
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
