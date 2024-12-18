<?php 

namespace App\Service\Api;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Utilities\Generate;
use Abiesoft\Resources\Utilities\Info;
use App\Service\Service;

class CsrfApi extends Service
{
    public function set()
    {
        $this->authentication();
        $csrf = Generate::acak();
        $device = Info::device();
        $ip = Info::ip();

        $cek = DB::terhubung()->query("SELECT id FROM token WHERE device ='".$device."' AND ip ='".$ip."' ");
        if($cek->hitung()){
            $id = "";
            foreach($cek->hasil() as $c){
                $id = $c->id;
            }
            $input = DB::terhubung()->perbarui('token', $id, [
                'csrf' => $csrf
            ]);
        }else{
            $input = DB::terhubung()->input('token', [
                'csrf' => $csrf,
                'device' => $device,
                'ip' => $ip
            ]);
        }

        $data = "";
        if($input){
            $data = $csrf;
        }

        return $this->result($data);
    }

}
