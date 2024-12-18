<?php 

namespace App\Service\Api;

use App\Model\Test;
use App\Service\Service;

class TestApi extends Service
{
    public function load($param)
    {
        $this->authentication();
        return match ($this->requestMethod()) {
            'post' => $this->keep(),
            'put' => $this->replace(),
            'delete' => $this->remove(),
            default => $this->get($param)
        };
    }

    protected function get($param)
    {
        if($param){
            $this->getWithParam($param);
        }else{
            $this->getWithoutParam();
        }
    }

    protected function getWithParam($param)
    {
        print_r($param);
    }

    protected function getWithoutParam()
    {
        Test::all(output:'json');
    }

    protected function keep()
    {
        Test::insert();
    }

    protected function replace()
    {
        Test::replace();
    }

    protected function remove()
    {
        Test::remove();
    }

}
