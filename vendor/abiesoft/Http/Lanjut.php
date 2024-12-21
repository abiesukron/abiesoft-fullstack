<?php 

namespace Abiesoft\Resources\Http;

use Abiesoft\Resources\Utilities\Config;

class Lanjut {

    public static function ke($location = "")
    {
        if ($location) {
            if (is_numeric($location)) {
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        die("404 Not Found");
                        exit();
                    case 403:
                        header('HTTP/1.0 403 Forbidden');
                        die("403 Forbidden");
                        exit();
                }
            }
            header('location:' . Config::baseURL() . $location);
            exit();
        }
    }

}