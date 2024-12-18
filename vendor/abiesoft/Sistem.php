<?php

namespace Abiesoft\Resources;

use Abiesoft\Resources\Http\Route;

class Sistem {

    public function start(){
        $router = new Route();
        $router->aktif();
    }

}