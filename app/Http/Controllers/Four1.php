<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Four;

class Four1 extends Controller
{
   public function index(){
       return view('Four.index');
   }

   public function fouradd(Request $request){
    $this->validate($request, [
        'email' => 'required|unique:four|max:255',
        'pwd' => 'required',
        'phone' => 'required',
    ]);
     $model = new Four();

     $model->email =$request['email'];
     $model->pwd =$request['pwd'];
     $model->phone =$request['phone'];
     
     if($model->save()){
         return $this->fourshow();
     }else{
         return "error";
     }
   }

   public function fourshow(){
       return view('four.fourshow');
   }

   public function fouryan(Request $request){
    $this->validate($request, [
        
        'pwd' => 'required',
        'email' => 'required',
       
        

    ]);
    $model = new Four();

    $data = $model->where('pwd',$request['pwd'])->where('email',$request['email'])->first();

    if($data){
        return view('four.greetings', ['data' => $data]);
    }else{
        return "error";
    }
   }
}
