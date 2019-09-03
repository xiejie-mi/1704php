<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Five;

class Fivel extends Controller
{
    public function index(){
        return view('five.index');
    }

    public function fiveadd(Request $request){
        $this->validate($request, [
            'emali' => 'required|unique:five|max:255',
            'phone' => 'required',
            'pwd' => 'required',
           
        ]);

        $model= new Five();

        $model->emali=$request['emali'];
        $model->pwd=$request['pwd'];
        $model->phone=$request['phone'];
        $model->name= 'sina_'.rand(100000,999999);

        if($model->save()){
            return $this->login();
        }else{
            return "error";
        }

    }

    public function login(){
        return view('five.register');
    }

    public function register(){
        return 111;
    }
}
