<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YayinEvi extends Model
{
    protected $guarded = [];
    //protected $fillable = ['name','selflink'];
    static function getField($id,$field){
        $control = YayinEvi::where("id","=",$id)->count();
        if($control != 0){
            $control2 = YayinEvi::where("id","=",$id)->get();
            return $control2[0][$field];
        }else{
            return "Silinmiş Yayınevi";
        }
    }
}
