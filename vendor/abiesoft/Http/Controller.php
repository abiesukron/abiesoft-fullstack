<?php 

namespace Abiesoft\Resources\Http;

use Abiesoft\Resources\Utilities\Config;
use Latte\Engine;

class Controller {

    public string   $url = "",
        $apikey = "",
        $prefix = "",
        $title = "",
        $nama_sesi = "",
        $email_sesi = "",
        $photo_sesi = "",
        $salt_sesi = "",
        $id_sesi = "",
        $grupid_sesi = "",
        $namagrup_sesi = "";

    public function view(String $page, String $model, array $data){
        $finaldata = [];

        $d = new Controller;
        $d->url = Config::baseURL();
        $d->apikey = Config::env('APIKEY');
        $d->prefix = Config::env('ADMIN_PANEL');
        $d->title = "";

        foreach ($data as $k => $v) {
            $d->$k = $v;
        }

        $finaldata = $d;

        $dir = __DIR__ . "/../../../";
        $latte = new Engine();
        $latte->setTempDirectory($dir . "temp");

        if($model == "admin"){
            if (file_exists($dir . "templates/admin/page/" . $page . ".latte")) {
                $latte->render($dir . "templates/admin/page/" . $page . ".latte", $finaldata);
                die();
            } else {
                $latte->render($dir . "templates/error/404.latte", $finaldata);
                die();
            }
        }

        if(explode("/", $page)[0] == "website"){

        }

    }

}