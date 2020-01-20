<?php

namespace App\Http\Controllers\front\basket;

use App\Helper\sepetHelper;
use App\Http\Controllers\Controller;
use App\Kitaplar;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index(){
        return view("front.basket.index");
    }
    public function add($id){
        $control = Kitaplar::where("id","=",$id)->count();
        if($control != 0){
            $basket = [];
            $data = Kitaplar::where("id","=",$id)->get();
//            $basket[$id] = ["id" => $id,"fiyat" => $data[0]["fiyat"]];
//            Session(["basket" => $basket]);
            sepetHelper::add($id,$data[0]["fiyat"],asset($data[0]["image"]),$data[0]["name"]);
            return redirect()->back()->with("status","Sepete Eklendi");
        }else{
           return redirect()->route("index");
        }
    }
    public function remove($id){
        sepetHelper::remove($id);
        return redirect()->back();
    }

    public function complete(){
        if(sepetHelper::count() != 0){
            return view("front.basket.complete");
        }else{
            return redirect("/");
        }
    }

    public function completeStore(Request $request){
        $request->validate([
           "adres" => "required",
           "telefon" => "required"
        ]);
        $adres = $request->input("adres");
        $telefon = $request->input("telefon");
        $mesaj = $request->input("mesaj");
        $name = $request->input("name");
        $json = json_encode(sepetHelper::allList());
        $array = [
            "user_id" => Auth::id(),
            "adres" => $adres,
            "telefon" => $telefon,
            "mesaj" => $mesaj,
            "json" => $json
        ];
        $insert = Order::create($array);
        if($insert){
            Session::forget("basket");
            return redirect()->back()->with("status","Siparişiniz Alındı");
        }else{
            return redirect()->back()->with("status","Siparişiniz Alınamadı");
        }

    }
    public function flush(){
        Session::forget("basket");
        return redirect("/");
    }
}
