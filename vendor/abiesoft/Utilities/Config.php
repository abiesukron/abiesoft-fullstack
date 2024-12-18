<?php 

namespace Abiesoft\Resources\Utilities;

use Symfony\Component\Yaml\Yaml;

class Config {

    public static function env(string $nama) :string {
        return parse_ini_file(__DIR__ . "/../../../.env")[$nama];
    }

    public static function yaml(string $namafile) :array {
        return Yaml::parseFile(__DIR__ . "/../../../config/" . $namafile . ".yaml");
    }

    public static function baseURL(): string
    {
        $domain = self::env("DOMAIN");
        $port = self::env("PORT");
        $ssl = self::env("SSL");
        ($ssl) ? $http = "https://" : $http = "http://";

        if (count(explode(".", $domain)) > 3) {
            $domain = $domain . ":" . $port;
        } else {
            $domain = $domain;
        }

        return $http . $domain . "/";
    }

}