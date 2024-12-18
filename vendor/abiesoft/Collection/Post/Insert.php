<?php

namespace Abiesoft\Resources\Collection\Post;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Utilities\Guard;
use Abiesoft\Resources\Utilities\Info;

trait Insert {

    public static function insert(string $tabel = ""){
        $formItem = self::cekFormElement();
        
        $csrf = "";
        if(isset($formItem['__csrf'])){
            $csrf = $formItem['__csrf'];
            unset($formItem['__csrf']);
        }

        $device = Info::device();
        $ip = Info::ip();
        
        if(Guard::formChecker($csrf, $device, $ip)){
            $tabel = self::tabel($tabel);
            $cekalready = self::sudahada($tabel, $formItem);
            if($cekalready){
                return self::badrequest();
            }else{
                $input = DB::terhubung()->input($tabel, $formItem);
                if($input){
                    $data = self::databaru($tabel, $formItem);
                    return self::result($data);
                }else{
                    return self::badrequest();
                }
            }   
        }else{
            return self::badrequest('Token Expire');
        }
    }
    
}