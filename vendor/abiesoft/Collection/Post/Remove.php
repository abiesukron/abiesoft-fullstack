<?php

namespace Abiesoft\Resources\Collection\Post;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Utilities\Guard;
use Abiesoft\Resources\Utilities\Info;

trait Remove {

    public static function remove(string $tabel = ""){
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

        if(Guard::formChecker($csrf, $device, $ip)){
            $tabel = self::tabel($tabel);
            $data = self::databyid($tabel, $id);
            $hapus = DB::terhubung()->hapus($tabel, ['id','=',$id]);
            if($hapus){
                return self::result($data);
            }else{
                return self::badrequest();
            }
        }else{
            return self::badrequest('Token Expire');
        }

    }

}