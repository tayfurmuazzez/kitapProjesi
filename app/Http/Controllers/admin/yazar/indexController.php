<?php

namespace App\Http\Controllers\admin\yazar;

use App\Helper\mHelper;
use App\Helper\imageUpload;
use App\Http\Controllers\Controller;
use App\Yazarlar;
use Illuminate\Http\Request;
Use File;

class indexController extends Controller
{
    public function index(){
        $data['data'] = Yazarlar::paginate(10);
        return view('admin.yazar.index',$data);
    }
    public function create(){
        return view('admin.yazar.create');
    }

    public function store(Request $request){
        $all = $request->except("_token");
        $all['selflink'] = mHelper::permalink($all['name']);
        $all["image"] = imageUpload::singleUpload(rand(1,900),"yazar",$request->file("image"));
        $insert = Yazarlar::create($all);
        if($insert){
            return redirect()->back()->with('status','Yazar Adı Başarılı Bir Şekilde Eklendi');
        }else{
            return redirect()->back()->with('status','Yazar EKLENEMEDİ');
        }
    }
    public function edit($id){
        $control = Yazarlar::where("id","=",$id)->count();
        if($control != 0){
            $data = Yazarlar::where("id","=",$id)->get();
            return view("admin.yazar.edit",["data" => $data]);
        }else{
            return redirect("/");
        }
    }
    public function update(Request $request){
        $id = $request->route("id");
        $control = Yazarlar::where("id","=",$id)->count();
        if($control != 0){
            $data = Yazarlar::where("id","=",$id)->get();
            $all = $request->except("_token");
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,9000),"yazar",$request->file("image"),$data,'image');
            $update = Yazarlar::where("id","=",$id)->update($all);
            if($update){
                return redirect()->back()->with('status','Yazar Başarılı Bir Şekilde Güncellendi');
            }else{
                return redirect()->back()->with('status','Yazar DÜZELTİLEMEDİ');
            }
        }else{
            return redirect("/");
        }

    }
    public function delete($id){
        $control = Yazarlar::where("id","=",$id)->count();
        if($control != 0){
            $data = Yazarlar::where("id","=",$id)->get();
            File::delete("public/",$data[0]["image"]);
            Yazarlar::where("id","=",$id)->delete();
            return redirect()->back();
        }else{
            return redirect("/");
        }
    }
}
