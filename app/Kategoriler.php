<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    protected $guarded = [];
    static function getField($id,$field){
        $control = Kategoriler::where("id","=",$id)->count();
        if($control != 0){
            $control2 = Kategoriler::where("id","=",$id)->get();
            return $control2[0][$field];
        }else{
            return "Silinmiş Kategori";
        }
    }
}
