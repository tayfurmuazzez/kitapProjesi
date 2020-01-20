<?php
namespace App\Helper;
Use File;
Use Image;
class imageUpload{
    static function singleUpload($name,$directory,$file){
        $rand = $name;
        $dir = 'images/'.$directory.'/'.$rand;
        $dirLarge = $dir."/large";
        if(!empty($file)){
            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true);
            }
            if(!File::exists($dirLarge)){
                File::makeDirectory($dirLarge,0755,true);
            }

            $filename = rand(1,9000).".".$file->getClientOriginalExtension();
            $path = public_path($dir."/".$filename);
            $path2 = public_path($dirLarge."/".$filename);

            Image::make($file->getRealPath())->save($path2);
            Image::make($file->getRealPath())->resize(250,250)->save($path);
            return $dir."/".$filename;
        }else{
            return "";
        }
    }

    static function singleUploadUpdate($name,$directory,$file,$data,$field){
        $rand = $name;
        $dir = 'images/'.$directory.'/'.$rand;
        $dirLarge = $dir."/large";
        if(!empty($file)){
            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true);
            }
            if(!File::exists($dirLarge)){
                File::makeDirectory($dirLarge,0755,true);
            }

            File::delete('public/',$data[0]['image']);
            $dizi = explode("/",$data[0]['image']);
            $dizi[2] = $dizi[2]."/large";
            File::delete('public/',implode("/",$dizi));

            $filename = rand(1,9000).".".$file->getClientOriginalExtension();
            $path = public_path($dir."/".$filename);
            $path2 = public_path($dirLarge."/".$filename);

            Image::make($file->getRealPath())->save($path2);
            Image::make($file->getRealPath())->resize(250,250)->save($path);
            return $dir."/".$filename;
        }else{
            return $data[0][$field];
        }
    }
}