<?php 

namespace Abiesoft\Resources\Http;

use Abiesoft\Resources\Utilities\Input;

trait Request {

    public function method()
    {
        $method = "get";

        if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
            if (Input::get('__method') == "PATCH") {
                $method = "patch";
            } else if (Input::get('__method') == "DELETE") {
                $method = "delete";
            } else {
                $method = "post";
            }
        }

        return $method;
    }

    public function path()
    {
        $path = "";

        (substr($_SERVER['REQUEST_URI'], -1) == "/") ? $path = substr($_SERVER['REQUEST_URI'], 0, -1) : $path = $_SERVER['REQUEST_URI'];
        ($path == "") ? $path = "/" : $path = $path;

        if(isset(explode("/",$path)[1])){

            if(explode("/",$path)[1] == "admin"){

                // Admin Route
                if(count(explode("/", $path)) == 5){
                    if(explode("/", $path)[4] == "add"){
                        $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/" . explode("/", $path)[3]. "/add";
                    }else{
                        $path = $path;
                    }
                }else if (count(explode("/", $path)) > 5) {
                    if(explode("/", $path)[4] == "edit" || explode("/", $path)[4] == "read"){
                        $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/" . explode("/", $path)[3]. "/" .explode("/", $path)[4]. "/:parameter";
                    }else{
                        $path = $path;
                    }
                } else {
                    $path = $path;
                }
    
            }else if(explode("/",$path)[1] == "api"){
                
                // Api Route
                if (count(explode("/", $path)) == 4) {
                    if (explode("/", $path)[3] != "excel") {
                        $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/:id";
                    } else {
                        $path = $path;
                    }
                } else if (count(explode("/", $path)) > 4) {
                    $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/:parameter";
                } else {
                    $path = $path;
                }
                
            }else{

                if (count(explode("/", $path)) == 4) {
                    if (explode("/", $path)[3] != "excel") {
                        $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/:id";
                    } else {
                        $path = $path;
                    }
                } else if (count(explode("/", $path)) > 4) {
                    $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/:parameter";
                } else {
                    $path = $path;
                }
                
            }

        }else{
            $path = $path;
        }

        return $path;
    }

    public function params()
    {
        $path = "";
        $params = [];

        (substr($_SERVER['REQUEST_URI'], -1) == "/") ? $path = substr($_SERVER['REQUEST_URI'], 0, -1) : $path = $_SERVER['REQUEST_URI'];
        ($path == "") ? $path = "/" : $path = $path;

        if (explode("/", $path)[1] == "api") {
            if (count(explode("/", $path)) > 3) {
                $dataparam = explode("/", $path);
                for ($i = 0; $i < count($dataparam); $i++) {
                    if ($i > 2) {
                        array_push($params, $dataparam[$i]);
                    }
                }
            } else {
                $params = [];
            }
        }

        if (explode("/", $path)[1] == "admin") {
            if (count(explode("/", $path)) > 5) {
                $dataparam = explode("/", $path);
                for ($i = 0; $i < count($dataparam); $i++) {
                    if ($i > 4) {
                        array_push($params, $dataparam[$i]);
                    }
                }
            } else {
                $params = [];
            }
        }

        return $params;
    }

}