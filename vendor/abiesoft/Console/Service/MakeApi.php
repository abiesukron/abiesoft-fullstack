<?php

namespace Abiesoft\Resources\Console\Service;

class MakeApi {

    public static function run(string $nama)
    {
        if (count(explode("Api", $nama)) > 1) {
            $nama = $nama;
        } else {
            $nama = ucfirst($nama) . "Api";
        }

        $dir = __DIR__ . "/../../../../service/Api";
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
        $isi = "namespace App\Service\Api;\n\n";
        fwrite($file, $isi);
        $isi = "use App\Service\Service;\n\n";
        fwrite($file, $isi);
        $isi = "class " . $nama . " extends Service\n";
        fwrite($file, $isi);
        $isi = "{\n";
        fwrite($file, $isi);

        $isi = "    public function load($" . "" . "param)\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->authentication();\n";
        fwrite($file, $isi);
        $isi = "        return match ($" . "" . "this->requestMethod()) {\n";
        fwrite($file, $isi);
        $isi = "            'post' => $" . "" . "this->keep(),\n";
        fwrite($file, $isi);
        $isi = "            'put' => $" . "" . "this->replace(),\n";
        fwrite($file, $isi);
        $isi = "            'delete' => $" . "" . "this->remove(),\n";
        fwrite($file, $isi);
        $isi = "            default => $" . "" . "this->get($" . "" . "param)\n";
        fwrite($file, $isi);
        $isi = "        };\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function get($" . "" . "param)\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        if($" . "" . "param){\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "this->getWithParam($" . "" . "param);\n";
        fwrite($file, $isi);
        $isi = "        }else{\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "this->getWithoutParam();\n";
        fwrite($file, $isi);
        $isi = "        }\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function getWithParam($" . "" . "param)\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "parameter berupa array\n";
        fwrite($file, $isi);
        $isi = "            Menampilkan data dengan parameter output json\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function getWithoutParam()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            Menampilkan data tanpa parameter output json\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function keep()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            End point untuk menambahkan data via api\n";
        fwrite($file, $isi);
        $isi = "            url : api/" . ucfirst(explode("Api", $nama)[0]) . "\n";
        fwrite($file, $isi);
        $isi = "            __method : POST\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function replace()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            End point untuk memperbarui data via api\n";
        fwrite($file, $isi);
        $isi = "            url : api/" . ucfirst(explode("Api", $nama)[0]) . "\n";
        fwrite($file, $isi);
        $isi = "            __method : PUT\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function remove()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            End point untuk menambahkan data via api\n";
        fwrite($file, $isi);
        $isi = "            url : api/" . ucfirst(explode("Api", $nama)[0]) . "\n";
        fwrite($file, $isi);
        $isi = "            __method : DELETE\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);
        fclose($file);
        echo "\n\e[0;102m Sukses! \e[0m\n\e[0;36mLokasi:\e[0m service/Api/" . $nama . ".php \n\n";
    }

}