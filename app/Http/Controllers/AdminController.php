<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
//use Illuminate\Support\Facades\Hash;
use Auth;
use App\Menu;
use App\Foods;
use App\FoodType;
use App\PageUrl;
use App\Functions;


class AdminController extends Controller
{
    public function getIndex(){
        
        // $data = Menu::with('Foods','Foods.FoodType')->get();
        // foreach($data as $menu){
        //     echo "<h3>".$menu->name."</h3>";
        //     echo "<br>";
        //     foreach($menu->Foods as $monan) {
        //         echo "- ".$monan->name;
        //         echo "<br>";
        //     }
        //     echo "<hr>";
        // }
        // die;
    	return view('pages.index');
    }

    public function getListProduct(){
        $foods = Foods::orderBy('id_type','asc')->with('FoodType')->get();
        //dd($foods);die;
    	return view('pages.list-product',compact('foods'));
    }

    public function getListProductByType($id){
        $foods = Foods::where('id_type',$id)
                ->with('FoodType')->get();
        //dd($foods);die;
        $type = FoodType::where('id',$id)->first();
    	return view('pages.list-product',compact('foods','type'));
    }

    public function getAddProduct(){
        return view('pages.add-product');
    }
    public function postAddProduct(Request $req){
        $req->validate([
            'name'=>'required|min:3|max:50',
            'update_at'=>'required|date'
        ],[
            'name.required'=>"Vui long nhap ten",
            'update_at.date'=> "Chọn ngày tháng đúng định dạng"
        ]);
        $f = new Functions;
        $url = new PageUrl;
        $url->url = $f->changeTitle($req->name);
        $url->save();

        $food = new Foods;
        $food->id_type = $req->type;
        $food->id_url = $url->id;
        $food->name = $req->name;
        $food->summary = $req->summary;
        $food->detail = $req->detail;
        $food->price = $req->price;
        $food->promotion_price = $req->promotion_price;
        $food->promotion = $req->promotion;
        $food->update_at = date('Y-m-d',strtotime($req->update_at));
        $food->unit = $req->unit;
        $food->today = isset($req->today)? 1 : 0;
        if($req->hasFile('image')){
            $hinh = $req->file('image');
            //dd($hinh);
            $hinh->move('source/images/hinh_mon_an/',$hinh->getClientOriginalName());
            $food->image = $hinh->getClientOriginalName();
        }
        else{
            $food->image = '';
        }
        $food->save();
        return redirect()->route('list-product-by-type',$req->type)
                        ->with('success','Thêm thành công');

    }

    public function getEditProduct($id){
        $food = Foods::where('id',$id)->with('PageUrl')->first();
        return view('pages.edit-product',compact('food'));
    }

    public function postEditProduct(Request $req){
        $req->validate([
            'name'=>'required|min:3|max:50',
            'update_at'=>'required|date'
        ],[
            'name.required'=>"Vui long nhap ten",
            'update_at.date'=> "Chọn ngày tháng đúng định dạng"
        ]);

        $f = new Functions;
        $url = PageUrl::where('url',$req->url)->first();
        $url->url = $f->changeTitle($req->name);
        $url->save();

        $food = Foods::where('id',$req->id)->first();;
        $food->id_type = $req->type;
        $food->id_url = $url->id;
        $food->name = $req->name;
        $food->summary = $req->summary;
        $food->detail = $req->detail;
        $food->price = $req->price;
        $food->promotion_price = $req->promotion_price;
        $food->promotion = $req->promotion;
        $food->update_at = date('Y-m-d',strtotime($req->update_at));
        $food->unit = $req->unit;
        $food->today = isset($req->today)? 1 : 0;
        if($req->hasFile('image')){
            $hinh = $req->file('image');
            //dd($hinh);
            $hinh->move('source/images/hinh_mon_an/',$hinh->getClientOriginalName());
            $food->image = $hinh->getClientOriginalName();
        }
        $food->save();
        return redirect()->route('list-product-by-type',$req->type)
                        ->with('success','Sửa thành công');
    }

    public function postDeleteProduct(Request $req){
        $id = $req->idSP;
        $result = Foods::where('id',$id)->first();
        if(!$result){
            echo "error";
        }
        else{
            $result->delete();
            echo "success";
        }
        return;
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
