<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yazarlar extends Model
{
   protected $guarded = [];
   static function getField($id,$field){
       $control = Yazarlar::where("id","=",$id)->count();
       if($control != 0){
           $control2 = Yazarlar::where("id","=",$id)->get();
           return $control2[0][$field];
       }else{
           return "Silinmiş Yazar";
       }
   }
}
