<?php 

namespace App\Controller\Admin;

use Abiesoft\Resources\Http\Controller;
use Abiesoft\Resources\Http\Lanjut;
use Abiesoft\Resources\Utilities\Config;

class TestController extends Controller
{

    public function index()
    {
        Lanjut::ke(Config::env('ADMIN_PANEL').'/test/read/tugas');
    }

    public function add()
    {
        Lanjut::ke(Config::env('ADMIN_PANEL').'/test/read/tugas');
    }

    public function edit($parameter)
    {
        Lanjut::ke(Config::env('ADMIN_PANEL').'/test/read/tugas');
    }

    public function read($parameter)
    {
        $page = $parameter[0];
        return $this->view(
            page: 'test/sample/'.$page,
            model: 'admin',
            data: [
                'title' => 'Test | '.ucfirst($page),
            ]
        );
    }

}
