<?php

namespace Abiesoft\Resources\Console\Model;

class MakeModel {

    public static function run(string $nama)
    {
        $dir = __DIR__ . "/../../../../models";
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
        $modelName = ucfirst($nama);
        $file = fopen($dir . "/" . $modelName . ".php", 'w') or die("Tidak Dapat Membuka File");
        $isi = "<?php \n\n";
        fwrite($file, $isi);
        $isi = "namespace App\Model;\n\n";
        fwrite($file, $isi);
        $isi = "use Abiesoft\Resources\Collection\DataManagement;\n\n";
        fwrite($file, $isi);
        $isi = "class " . $modelName . "\n";
        fwrite($file, $isi);
        $isi = "{\n";
        fwrite($file, $isi);
        $isi = "    use DataManagement;\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);
        fclose($file);
        echo "\n\e[0;102m Sukses! \e[0m\n\e[0;36mLokasi:\e[0m models/" . $nama . ".php \n\n";
    }

}