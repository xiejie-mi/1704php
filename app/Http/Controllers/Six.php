<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class Six extends Controller
{
    public function index()
    {
        return view('six.index');
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users',
            'pwd' => 'required',
            'phone' => 'required',
        ]);

        $model = new Users();

        $model->nickname =$request['name'];
        $model->pwd =md5($request['pwd']);
        $model->phone =$request['phone'];
        $model->name =rand(10000000,99999999);

        if($model->save()){
            return $this->login();
        }else{
            return "error";
        }
    }

    public function login(){
        return view('six.script');
    }

    public function sixYan(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'pwd' => 'required',
           
        ]);
        $model = new Users();

        $data= $model->where('name',$request['name'])->where('pwd',md5($request['pwd']))->first();

        if($data){
            return view('six.greeting', ['data' => $data]);
        }else{
            return "error";
        }
    }
}
