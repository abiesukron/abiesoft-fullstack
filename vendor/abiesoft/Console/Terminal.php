<?php 

namespace Abiesoft\Resources\Console;

use Abiesoft\Resources\Console\Controller\DeleteController;
use Abiesoft\Resources\Console\Controller\MakeController;
use Abiesoft\Resources\Console\Database\Backup;
use Abiesoft\Resources\Console\Database\Import;
use Abiesoft\Resources\Console\Database\Refresh;
use Abiesoft\Resources\Console\Database\Restore;
use Abiesoft\Resources\Console\Model\DeleteModel;
use Abiesoft\Resources\Console\Model\MakeModel;
use Abiesoft\Resources\Console\Schema\DeleteSchema;
use Abiesoft\Resources\Console\Schema\MakeSchema;
use Abiesoft\Resources\Console\Service\DeleteApi;
use Abiesoft\Resources\Console\Service\MakeApi;
use Abiesoft\Resources\Http\Route;
use Abiesoft\Resources\Utilities\Config;

class Terminal {

    public function __construct($command)
    {
        unset($command[0]);

        $action = "";
        $class = "";
        $namafile = "";
        if (isset($command[1])) {
            if (count(explode(":", $command[1])) > 1) {
                $action = explode(":", $command[1])[0];
                $class = explode(":", $command[1])[1];
                if (isset($command[2])) {
                    $namafile = $command[2];
                } else {
                    if (explode(":", $command[1])[0] == "db") {
                        $action = explode(":", $command[1])[0];
                        $class = explode(":", $command[1])[1];
                    } else {
                        return $this->help();
                    }
                }
            } else {
                $action = $command[1];
            }
        }

        return match ($action) {
            'start' => $this->start($class),
            'db' => $this->database($class),
            'make' => $this->make($class, $namafile),
            'delete' => $this->delete($class, $namafile),
            'info' => $this->info($command),
            default => $this->help()
        };
    }

    protected function start(){
        $dir = __DIR__ . "/../../../" . Config::env('PUBLIC_FOLDER');
        chdir($dir);
        $output = null;
        $result = null;
        exec("ping " . Config::env('DOMAIN'), $output, $result);
        if ($result) {
            echo "\n\e[0m\e[0;101m Domain Error! \e[0m\n";
            echo "\e[0;36mPesan:\e[0m \e[0m Cek setingan domain pada file .env\e[0m\n\n";
            die();
        } else {
            $ipdestination = str_replace(":", "", explode(" ", $output[3])[2]);
            if (Config::env('DOMAIN') ==  $ipdestination || Config::env('DOMAIN') == "127.0.0.1") {
                echo "\n\n\n\e[0m\e[0;102m Server Running \e[0m\n";
                echo "\e[0;36mBerjalan di Url:\e[0m \e[0m http://" . Config::env('DOMAIN') . ":" . Config::env('PORT') . "\e[0m\n";
                echo "\e[0;36mCatatan:\e[0m \e[0m Untuk mematikan server close terminal atau tekan ctrl + C\e[0m\n\n\n\n";
                exec("php -S " . Config::env('DOMAIN') . ":" . Config::env('PORT'), $output, $result);
            } else {
                echo "\n\e[0m\e[0;101m Domain Error! \e[0m\n";
                echo "\e[0;36mPesan:\e[0m \e[0m Cek setingan domain pada file .env\e[0m\n\n";
                die();
            }
        }
    }

    protected function info($command)
    {
        unset($command[1]);
        $info = $command[2];
        return match ($info) {
            'route' => $this->route(),
            default => $this->help()
        };
    }

    protected function route()
    {
        echo "\n";
        echo "\n\e[0;102m Daftar Route \e[0m\n";
        $tabel = "%-5.5s %-100.100s  %7.7s \n";
        printf($tabel, 'No', 'Route', 'Method');
        $no = 1;
        $router = new Route;
        if(count($router->listRoute()) > 0){
            foreach ($router->listRoute() as $k => $v) {
                foreach ($v as $kv => $vv) {
                    printf($tabel, $no . ". ", $kv . "  --------------------------------------------------------------------------------------------------------------------------", strtoupper($k));
                    $no++;
                }
            }
        }else{
            echo "Belum ada route";
        }
        echo "\n";
    }

    protected function database(string $class)
    {
        return match ($class) {
            'backup' => Backup::run(),
            'import' => Import::run(),
            'refresh' => Refresh::run(),
            'restore' => Restore::run(),
            default => $this->help()
        };
    }

    protected function make(string $class, string $namafile)
    {
        return match ($class) {
            'controller' => MakeController::run($namafile),
            'schema' => MakeSchema::run($namafile),
            'model' => MakeModel::run($namafile),
            'api' => MakeApi::run($namafile),
            default => $this->help()
        };
    }

    protected function delete(string $class, string $namafile)
    {
        return match ($class) {
            'controller' => DeleteController::run($namafile),
            'schema' => DeleteSchema::run($namafile),
            'model' => DeleteModel::run($namafile),
            'api' => DeleteApi::run($namafile),
            default => $this->help()
        };
    }

    protected function help(){
        echo "\n\n\e[0;102mHelp! \e[0m\n";
        echo "\e[0;36mAplikasi:\e[0m \n";
        echo "\e[0m     start \n";
        echo "\e[0m     info route \n";
        echo "\e[0;36mDatabase:\e[0m \n";
        echo "\e[0m     db:import \n";
        echo "\e[0m     db:refresh \n";
        echo "\e[0m     db:backup \n";
        echo "\e[0m     db:restore \n";
        echo "\e[0;36mSchema:\e[0m \n";
        echo "\e[0m     make:schema [nama] \n";
        echo "\e[0m     delete:schema [nama] \n";
        echo "\e[0;36mModel:\e[0m \n";
        echo "\e[0m     make:model [nama] \n";
        echo "\e[0m     delete:model [nama] \n";
        echo "\e[0;36mApi Service:\e[0m \n";
        echo "\e[0m     make:api [nama] \n";
        echo "\e[0m     delete:api [nama] \n";
        echo "\n\n";
    }

}