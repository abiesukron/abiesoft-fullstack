<?php

namespace Abiesoft\Resources\Console\Schema;

class MakeSchema {

    public static function run(string $nama)
    {
        $dir = __DIR__ . "/../../../../schema";
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
        $isi = "namespace App\Schema;\n\n";
        fwrite($file, $isi);
        $isi = "use Abiesoft\Resources\Mysql\DB;\n";
        fwrite($file, $isi);
        $isi = "use Abiesoft\Resources\Mysql\Schema;\n";
        fwrite($file, $isi);
        $isi = "class " . $nama . " extends Schema \n";
        fwrite($file, $isi);
        $isi = "{\n\n";
        fwrite($file, $isi);

        $isi = "    public function buattabel()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "schema = new Schema;\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            contoh membuat kolom nama VARCHAR\n";
        fwrite($file, $isi);
        $isi = "            dengan panjang karakter 50\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "schema->teks(nama: 'nama', panjang: 50);\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "sql = $" . "" . "schema->create('" . $nama . "');\n";
        fwrite($file, $isi);
        $isi = "        DB::terhubung()->query($" . "" . "sql);\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->buatdata();\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function buatdata()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            DB::terhubung()->input('" . $nama . "', [\n";
        fwrite($file, $isi);
        $isi = "                'nama' => '',\n";
        fwrite($file, $isi);
        $isi = "            ]);\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);

        $isi = "$" . "" . "create = new " . $nama . "();\n";
        fwrite($file, $isi);
        $isi = "$" . "" . "create->buattabel();\n";
        fwrite($file, $isi);

        fclose($file);
        echo "\n\e[0;102m Sukses! \e[0m\n\e[0;36mLokasi:\e[0m schema/" . $nama . ".php \n\n";
    }

}