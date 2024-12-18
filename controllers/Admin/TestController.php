<?php 

namespace App\Controller\Admin;

use Abiesoft\Resources\Http\Controller;

class TestController extends Controller
{

    public function index()
    {
        return $this->view(
            page: 'test/index',
            model: 'admin',
            data: [
                'title' => 'Test',
            ]
        );
    }

    public function add()
    {
        return $this->view(
            page: 'test/add',
            model: 'admin',
            data: [
                'title' => 'Test',
            ]
        );
    }

    public function edit($parameter)
    {
        /*

            Halaman form edit data
            method GET
        */
    }

    public function read($parameter)
    {
        /*

            Halaman detail data
            method GET
        */
    }

}
