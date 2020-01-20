<?php

namespace App\Http\Controllers\admin\kategori;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Kategoriler;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index(){
        $data['data'] = Kategoriler::paginate(10);
        return view('admin.kategori.index',$data);
    }
    public function create(){
        return view('admin.kategori.create');
    }

    public function store(Request $request){

        $all = $request->except("_token");
        $all['selflink'] = mHelper::permalink($all['name']);
        $insert = Kategoriler::create($all);
        if($insert){
            return redirect()->back()->with('status','Kategori Başarılı Bir Şekilde Eklendi');
        }else{
            return redirect()->back()->with('status','Kategori EKLENEMEDİ');
        }
    }
    public function edit($id){
        $control = Kategoriler::where("id","=",$id)->count();
        if($control != 0){
            $data = Kategoriler::where("id","=",$id)->get();
            return view("admin.kategori.edit",["data" => $data]);
        }else{
            return redirect("/");
        }
    }
    public function update(Request $request){
        $id = $request->route("id");
        $control = Kategoriler::where("id","=",$id)->count();
        if($control != 0){
            $all = $request->except("_token");
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Kategoriler::where("id","=",$id)->update($all);
            if($update){
                return redirect()->back()->with('status','Kategori Başarılı Bir Şekilde Güncellendi');
            }else{
                return redirect()->back()->with('status','Kategori DÜZELTİLEMEDİ');
            }
        }else{
            return redirect("/");
        }

    }
    public function delete($id){
        $control = Kategoriler::where("id","=",$id)->count();
        if($control != 0){
            Kategoriler::where("id","=",$id)->delete();
            return redirect()->back();
        }else{
            return redirect("/");
        }
    }
    public function getData(Request $request){
        $data = DataTables::of(Kategoriler::query())
            ->addColumn('edit',function($x){
                return '<a href="'.route("admin.kategori.edit",["id" => $x->id]).'">Düzenle</a>';
            })
            ->addColumn('delete',function($x){
                return '<a href="'.route("admin.kategori.delete",["id" => $x->id]).'">Sil</a>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);

        return $data;
    }
}
