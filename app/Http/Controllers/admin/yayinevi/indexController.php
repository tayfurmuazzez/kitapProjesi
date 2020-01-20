<?php

namespace App\Http\Controllers\admin\yayinevi;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\YayinEvi;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data['data'] = YayinEvi::paginate(10);
        return view('admin.yayinevi.index',$data);
    }
    public function create(){
        return view('admin.yayinevi.create');
    }

    public function store(Request $request){

        $all = $request->except("_token");
        $all['selflink'] = mHelper::permalink($all['name']);
        $insert = YayinEvi::create($all);
        if($insert){
            return redirect()->back()->with('status','Yayın Evi Başarılı Bir Şekilde Eklendi');
        }else{
            return redirect()->back()->with('status','Yayın Evi EKLENEMEDİ');
        }
    }
     public function edit($id){
        $control = YayinEvi::where("id","=",$id)->count();
        if($control != 0){
            $data = YayinEvi::where("id","=",$id)->get();
            return view("admin.yayinevi.edit",["data" => $data]);
        }else{
            return redirect("/");
        }
     }
     public function update(Request $request){
         $id = $request->route("id");
         $control = YayinEvi::where("id","=",$id)->count();
         if($control != 0){
             $all = $request->except("_token");
             $all['selflink'] = mHelper::permalink($all['name']);
             $update = YayinEvi::where("id","=",$id)->update($all);
             if($update){
                 return redirect()->back()->with('status','Yayın Evi Başarılı Bir Şekilde Güncellendi');
             }else{
                 return redirect()->back()->with('status','Yayın Evi DÜZELTİLEMEDİ');
             }
         }else{
             return redirect("/");
         }

     }
     public function delete($id){
         $control = YayinEvi::where("id","=",$id)->count();
         if($control != 0){
             YayinEvi::where("id","=",$id)->delete();
             return redirect()->back();
         }else{
             return redirect("/");
         }
     }
}
