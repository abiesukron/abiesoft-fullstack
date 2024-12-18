<?php 

namespace App\Service;

use Abiesoft\Resources\Utilities\Config;
use Abiesoft\Resources\Utilities\Input;

class Service {

    protected function requestMethod(){
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if($method != 'get'){
            $method = strtolower(Input::get('__method'));
            if($method){
                $method = $method;
            }else{
                $method = "post";
            }
        }
        return $method;
    }

    protected function authentication()
    {
        $apikey = "";
        if (isset($_SERVER['HTTP_X_API_KEY'])) {
            $apikey = $_SERVER['HTTP_X_API_KEY'];
        } else {
            return $this->unauthorized();
        }

        $keysafe = Config::env("APIKEY");
        if ($apikey == $keysafe) {
            return;
        }

        return $this->forbidden();
    }

    protected function result(string|array $result = "")
    {
        $data = [];
        $data['code'] = 200;
        $data['message'] = "OK";
        $data['data'] = $result;
        echo json_encode($data);
        die();
    }

    protected function badrequest()
    {
        $data = [];
        $data['code'] = 400;
        $data['message'] = "BAD REQUEST";
        echo json_encode($data);
        die();
    }

    protected function unauthorized()
    {
        $data = [];
        $data['code'] = 401;
        $data['message'] = "UNAUTHORIZED";
        echo json_encode($data);
        die();
    }

    protected function forbidden()
    {
        $data = [];
        $data['code'] = 403;
        $data['message'] = "FORBIDDEN";
        echo json_encode($data);
        die();
    }

}