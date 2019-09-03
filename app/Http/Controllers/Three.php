<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class Three extends Controller
{
    /**
     * 储存一个新用户。
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('three.greeting');

        //
    }

    public function reDo(Request $request){
        $this->validate($request, [
            'nickname' => 'required|unique:users|max:255',
            'phone' => 'required',
            'emali' => 'required',
            'pwd' => 'required',
        ]);

        $model = new Users();
        $model->emali = $request['emali'];
        $model->pwd = $request['pwd'];
        $model->phone = $request['phone'];
        $model->nickname = 'users_'.rand(100000,999999);
        if($model->save()){
            return $this->login();
        }else{
             return "error";
        }
    }

    public function login(){
        return view('three.register');
    }

    public function register(Request $request){
        $this->validate($request, [
            'emali' => 'required',
            'pwd' => 'required',
        ]);
        $emali = $request->query('emali');
        $pwd = $request->query('pwd');
        $model = new Users();
        $data = $model->where('emali',$request['emali'])->where('pwd',$request['pwd'])->first();

        if(empty($data)){
            return "登录失败";
        }else{
            return view('three.xianxi',['data'=>$data]);
        }
    }

   
}