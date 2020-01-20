<?php

namespace App\Http\Controllers\front\cat;

use App\Http\Controllers\Controller;
use App\Kategoriler;
use App\Kitaplar;
use Illuminate\Http\Request;

class indexController extends Controller
{
   public function index($selflink){
       $control = Kategoriler::where("selflink","=",$selflink)->count();
       if($control != 0){
           $data["info"] = Kategoriler::where("selflink","=",$selflink)->get();
           $data["data"] = Kitaplar::where("kategori_id","=",$data["info"][0]["id"])->paginate(10);
           return view("front.cat.index",$data);
       }else{
           return redirect("/");
       }
   }
}
