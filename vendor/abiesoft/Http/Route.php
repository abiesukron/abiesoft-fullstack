<?php 

namespace Abiesoft\Resources\Http;

use Abiesoft\Resources\Utilities\Config;

class Route {

    use Request;
    private $route = [];

    public function __construct()
    {
        if(is_array(Config::yaml('route'))){
            foreach (Config::yaml('route') as $all => $only) {

                if(isset(explode("_",$all)[0])){

                    if(explode("_",$all)[0] == "api"){
                        $this->get("/api/".explode("_",$all)[1], [ucfirst(explode("_",$all)[1])."Api", "load"]);
                        $this->get("/api/".explode("_",$all)[1]."/:id", [ucfirst(explode("_",$all)[1])."Api", "load"]);
                        $this->get("/api/".explode("_",$all)[1]."/:parameter", [ucfirst(explode("_",$all)[1])."Api", "load"]);
                        $this->post("/api/".explode("_",$all)[1], [ucfirst(explode("_",$all)[1])."Api", "load"]);
                        $this->put("/api/".explode("_",$all)[1], [ucfirst(explode("_",$all)[1])."Api", "load"]);
                        $this->delete("/api/".explode("_",$all)[1], [ucfirst(explode("_",$all)[1])."Api", "load"]);
                    }

                    if(explode("_",$all)[0] == "admin"){
                        $this->get("/".Config::env('ADMIN_PANEL')."/".explode("_",$all)[1], [ucfirst(explode("_",$all)[1])."Controller", "index"]);
                        $this->get("/".Config::env('ADMIN_PANEL')."/".explode("_",$all)[1]."/add", [ucfirst(explode("_",$all)[1])."Controller", "add"]);
                        $this->get("/".Config::env('ADMIN_PANEL')."/".explode("_",$all)[1]."/edit/:parameter", [ucfirst(explode("_",$all)[1])."Controller", "edit"]);
                        $this->get("/".Config::env('ADMIN_PANEL')."/".explode("_",$all)[1]."/read/:parameter", [ucfirst(explode("_",$all)[1])."Controller", "read"]);
                    }
                }

            }
        } else {
            return $this->route;
        }

        $this->get("/api/csrf", ["CsrfApi", "set"]);
    }

    public function get(string $path, string|array $callback)
    {
        $this->route['get'][$path] = $callback;
    }

    public function post(string $path, string|array $callback)
    {
        $this->route['post'][$path] = $callback;
    }

    public function put(string $path, string|array $callback)
    {
        $this->route['put'][$path] = $callback;
    }

    public function delete(string $path, string|array $callback)
    {
        $this->route['delete'][$path] = $callback;
    }

    public function aktif(){
        $method = $this->method();
        $path = $this->path();
        $parameter = $this->params();
        $routemodel = explode("/",$path)[1];

        (isset($this->route[$method][$path])) ? $callback = $this->route[$method][$path] : $callback = $this->notFound();

        if (is_array($callback)) {

            return match($routemodel){
                'api' => $this->callBackApiModel($callback,$parameter),
                'admin' => $this->callBackAdminModel($callback,$parameter),
                default => $this->callBackDefaultModel($callback,$parameter)
            };

        }

        if (is_string($callback)) {
            die($callback);
        }

    }

    protected function callBackApiModel($callback,$parameter) {
        $service = "\App\Service\Api\\" . $callback[0];
        $ctrl = new $service;
        $function = $callback[1];
        $ctrl->$function($parameter);
    }

    protected function callBackAdminModel($callback,$parameter) {
        $controller = "\App\Controller\Admin\\" . $callback[0];
        $ctrl = new $controller;
        $function = $callback[1];
        $ctrl->$function($parameter);
    }

    protected function callBackDefaultModel($callback,$parameter) {
        $controller = "\App\Controller\Public\\" . $callback[0];
        $ctrl = new $controller;
        $function = $callback[1];
        $ctrl->$function($parameter);
    }

    protected function notFound() {
        $result = [];
        $result['code'] = 404;
        $result['message'] = "NOT FOUND";
        echo json_encode($result);
    }

    public function listRoute()
    {
        return $this->route;
    }

}