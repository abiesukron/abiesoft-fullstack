<?php

namespace Abiesoft\Resources\Collection;

use Abiesoft\Resources\Collection\Get\All;
use Abiesoft\Resources\Collection\Get\Join;
use Abiesoft\Resources\Collection\Get\Only;
use Abiesoft\Resources\Collection\Get\Where;
use Abiesoft\Resources\Collection\Get\GetOption;
use Abiesoft\Resources\Collection\Post\Insert;
use Abiesoft\Resources\Collection\Post\PostOption;
use Abiesoft\Resources\Collection\Post\Remove;
use Abiesoft\Resources\Collection\Post\Replace;

trait DataManagement {

    use All, Only, Where, Join, GetOption, Insert, Replace, Remove, PostOption;

    protected static function tabel(string $tabel = "")
    {
        if ($tabel != "") {
            $result = $tabel;
        } else {
            $result = strtolower(str_replace("App\Model\\", "", __CLASS__));
        }
        return $result;
    }

    protected static function result(string|array $result = "")
    {
        $data = [];
        $data['code'] = 200;
        $data['message'] = "OK";
        $data['data'] = $result;
        echo json_encode($data);
        die();
    }

    protected static function badrequest(string $result = "")
    {
        $data = [];
        $data['code'] = 400;
        $data['message'] = "BAD REQUEST";
        if($result != ""){
            $data['data'] = $result;   
        }
        echo json_encode($data);
        die();
    }
    
}