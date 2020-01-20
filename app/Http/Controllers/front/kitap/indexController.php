<?php

namespace App\Http\Controllers\front\kitap;

use App\Http\Controllers\Controller;
use App\Kitaplar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index($selflink){
        $control = Kitaplar::where("selflink","=",$selflink)->count();
        if($control != 0){
            $data["data"] = Kitaplar::where("selflink","=",$selflink)->get();
            $data["last_books"] = DB::table("kitaplars")->whereNotIn("id",[$data["data"][0]["id"]])->orderBy("id","desc")->limit(3)->get();
            return view("front.kitap.index",$data);

        }else{
            return redirect("/");
        }
    }
}
