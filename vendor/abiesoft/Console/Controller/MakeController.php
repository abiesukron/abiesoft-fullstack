<?php

namespace Abiesoft\Resources\Console\Controller;

class MakeController
{
    public static function run(string $string)
    {

        if (count(explode("Controller", $string)) > 1) {
            $nama = $string;
        } else {
            $nama = ucfirst($string) . "Controller";
        }

        $dir = __DIR__ . "/../../../../controllers/Admin";
        if (!is_dir($dir)) {
            mkdir($dir, 0777, false);
        }
        self::makeSure($dir, $nama);
        self::releaseFile($dir, $nama);
    }

    protected static function makeSure(string $dir, string $nama): void
    {

        if (file_exists($dir . "/" . $nama . ".php")) {
            echo "\n\e[0;101m Hati-hati! \e[0m\nFile " . $nama . ".php sudah ada. Ingin menimpanya?\e[0m\n";
            echo "Ketik [\e[0;32mYa\e[0m] untuk menimpah file\e[0m\n";
            echo "Tekan [\e[0;32mEnter\e[0m] untuk membatalkan\e[0m\n";
            echo "Pilihan anda : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "Y" || $jawab == "ya" || $jawab == "y" || $jawab == "Yes" || $jawab == "yes") {
                self::releaseFile($dir, $nama);
                die();
            } else {
                echo "\n\e[0m\e[0;101m Dibatalkan! \e[0m\n\n";
                die();
            }
        }
    }

    protected static function releaseFile(string $dir, string $nama): void
    {
        $file = fopen($dir . "/" . $nama . ".php", 'w') or die("Tidak Dapat Membuka File");
        $isi = "<?php \n\n";
        fwrite($file, $isi);
        $isi = "namespace App\Controller\Admin;\n\n";
        fwrite($file, $isi);
        $isi = "use Abiesoft\Resources\Http\Controller;\n\n";
        fwrite($file, $isi);
        $isi = "class " . $nama . " extends Controller\n";
        fwrite($file, $isi);
        $isi = "{\n\n";
        fwrite($file, $isi);

        $isi = "    public function index()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        return $" . "" . "this->view(\n";
        fwrite($file, $isi);
        $isi = "            page: '" . strtolower(explode("Controller", $nama)[0]) . "/index',\n";
        fwrite($file, $isi);
        $isi = "            model: 'admin', // Model admin untuk memanggil halaman admin dan model website untuk memanggil halaman website\n";
        fwrite($file, $isi);
        $isi = "            data: [\n";
        fwrite($file, $isi);
        $isi = "                'title' => '" . explode("Controller", $nama)[0] . "',\n";
        fwrite($file, $isi);
        $isi = "            ]\n";
        fwrite($file, $isi);
        $isi = "        );\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function add()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n\n";
        fwrite($file, $isi);
        $isi = "            Halaman form tambah data\n";
        fwrite($file, $isi);
        $isi = "            method GET\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function edit($" . "" . "parameter)\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n\n";
        fwrite($file, $isi);
        $isi = "            Halaman form edit data\n";
        fwrite($file, $isi);
        $isi = "            method GET\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function read($" . "" . "parameter)\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n\n";
        fwrite($file, $isi);
        $isi = "            Halaman detail data\n";
        fwrite($file, $isi);
        $isi = "            method GET\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);
        fclose($file);
        echo "\n\e[0;102m Sukses! \e[0m\n\e[0;36mLokasi Controller:\e[0m controllers/Admin/" . $nama . ".php \n\n";
    }
}
