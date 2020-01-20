<?php

namespace App\Http\Controllers\admin\slider;

use App\Helper\imageUpload;
use App\Http\Controllers\Controller;
use App\Slider;
use File;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data['data'] = Slider::paginate(10);
        return view('admin.slider.index',$data);
    }
    public function create(){
        return view('admin.slider.create');
    }

    public function store(Request $request){
        $all = $request->except("_token");
        $all["image"] = imageUpload::singleUpload(rand(1,900),"slider",$request->file("image"));
        $insert = Slider::create($all);
        if($insert){
            return redirect()->back()->with('status','Slider Resmi Başarılı Bir Şekilde Eklendi');
        }else{
            return redirect()->back()->with('status','Slider Resmi EKLENEMEDİ');
        }
    }
    public function edit($id){
        $control = Slider::where("id","=",$id)->count();
        if($control != 0){
            $data["data"] = Slider::where("id","=",$id)->get();
            return view("admin.slider.edit",$data);
        }else{
            return redirect("/");
        }
    }
    public function update(Request $request){
        $id = $request->route("id");
        $control = Slider::where("id","=",$id)->count();
        if($control != 0){
            $data = Slider::where("id","=",$id)->get();
            $all = $request->except("_token");
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,9000),"slider",$request->file("image"),$data,'image');
            $update = Slider::where("id","=",$id)->update($all);
            if($update){
                return redirect()->back()->with('status','Slider Başarılı Bir Şekilde Güncellendi');
            }else{
                return redirect()->back()->with('status','Slider DÜZELTİLEMEDİ');
            }
        }else{
            return redirect("/");
        }

    }
    public function delete($id){
        $control = Slider::where("id","=",$id)->count();
        if($control != 0){
            $data = Slider::where("id","=",$id)->get();
            File::delete("public/",$data[0]["image"]);
            $dizi = explode("/",$data[0]['image']);
            $dizi[2] = $dizi[2]."/large";
            File::delete('public/',implode("/",$dizi));
            Slider::where("id","=",$id)->delete();
            return redirect()->back();
        }else{
            return redirect("/");
        }
    }
}
