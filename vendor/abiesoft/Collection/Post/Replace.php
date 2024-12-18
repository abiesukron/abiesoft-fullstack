<?php

namespace Abiesoft\Resources\Collection\Post;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Utilities\Guard;
use Abiesoft\Resources\Utilities\Info;

trait Replace {

    public static function replace(string $tabel = ""){
        $formItem = self::cekFormElement();
        
        $csrf = "";
        if(isset($formItem['__csrf'])){
            $csrf = $formItem['__csrf'];
            $id = $formItem['id'];
            unset($formItem['__csrf']);
            unset($formItem['id']);
            unset($formItem['__method']);
        }

        $device = Info::device();
        $ip = Info::ip();

        $formItem = array_filter($formItem, function($value){ 
            return $value !== "" && $value !== null;
        });


        if(count($formItem) > 0){
            if(Guard::formChecker($csrf, $device, $ip)){
                $tabel = self::tabel($tabel);
                $perbarui = DB::terhubung()->perbarui($tabel, $id, $formItem);
                if($perbarui){
                    $data = self::databyid($tabel, $id);
                    return self::result($data);
                }else{
                    return self::badrequest();
                }
            }else{
                return self::badrequest('Token Expire');
            }
        }else{
            return self::badrequest();
        }

    }
    
}