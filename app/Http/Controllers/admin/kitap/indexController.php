<?php

namespace App\Http\Controllers\admin\kitap;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Kategoriler;
use App\Kitaplar;
use App\YayinEvi;
use App\Yazarlar;
use Illuminate\Http\Request;
use File;
class indexController extends Controller
{
    public function index(){
        $data['data'] = Kitaplar::paginate(10);
        return view('admin.kitap.index',$data);
    }
    public function create(){
        $data["yazarlar"] = Yazarlar::all();
        $data["yayinevleri"] = YayinEvi::all();
        $data["kategoriler"] = Kategoriler::all();
        return view('admin.kitap.create',$data);
    }

    public function store(Request $request){
        $all = $request->except("_token");
        $all['selflink'] = mHelper::permalink($all['name']);
        $all["image"] = imageUpload::singleUpload(rand(1,900),"kitap",$request->file("image"));
        $insert = Kitaplar::create($all);
        if($insert){
            return redirect()->back()->with('status','Kitap Adı Başarılı Bir Şekilde Eklendi');
        }else{
            return redirect()->back()->with('status','Kitap EKLENEMEDİ');
        }
    }
    public function edit($id){
        $control = Kitaplar::where("id","=",$id)->count();
        if($control != 0){
            $data["data"] = Kitaplar::where("id","=",$id)->get();
            $data["yazarlar"] = Yazarlar::all();
            $data["yayinevleri"] = YayinEvi::all();
            $data["kategoriler"] = Kategoriler::all();
            return view("admin.kitap.edit",$data);
        }else{
            return redirect("/");
        }
    }
    public function update(Request $request){
        $id = $request->route("id");
        $control = Kitaplar::where("id","=",$id)->count();
        if($control != 0){
            $data = Kitaplar::where("id","=",$id)->get();
            $all = $request->except("_token");
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,9000),"kitap",$request->file("image"),$data,'image');
            $update = Kitaplar::where("id","=",$id)->update($all);
            if($update){
                return redirect()->back()->with('status','kitap Başarılı Bir Şekilde Güncellendi');
            }else{
                return redirect()->back()->with('status','kitap DÜZELTİLEMEDİ');
            }
        }else{
            return redirect("/");
        }

    }
    public function delete($id){
        $control = Kitaplar::where("id","=",$id)->count();
        if($control != 0){
            $data = Kitaplar::where("id","=",$id)->get();
            File::delete("public/",$data[0]["image"]);
            $dizi = explode("/",$data[0]['image']);
            $dizi[2] = $dizi[2]."/large";
            File::delete('public/',implode("/",$dizi));
            Kitaplar::where("id","=",$id)->delete();
            return redirect()->back();
        }else{
            return redirect("/");
        }
    }
}
