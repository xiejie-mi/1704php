<?php 
  namespace App\Http\Controllers;

  use Illuminate\Http\Request;

  class Goods extends Controller
  {
      public function index(){
        // $id=$request['id'];
        //    return '131313111wwww'.$id;
        return view('goods.reg');
      }
  }
  
?>