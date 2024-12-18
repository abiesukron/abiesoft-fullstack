<?php 

namespace Abiesoft\Resources\Utilities;

use Abiesoft\Resources\Mysql\DB;

class Guard {

    public static function formChecker($csrf, $device, $ip): bool
    {
        $result = false;
        $data = DB::terhubung()->query("SELECT id FROM token WHERE csrf = '".$csrf."' AND device = '".$device."' AND ip = '".$ip."'  ");
        if($data->hitung()){
            $result = true;
        }

        return $result;
    }

}