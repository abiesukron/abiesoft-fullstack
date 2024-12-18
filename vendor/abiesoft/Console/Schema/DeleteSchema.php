<?php 

namespace Abiesoft\Resources\Console\Schema;

class DeleteSchema {

    public static function run(string $nama)
    {
        $dir = __DIR__ . "/../../../../schema";
        self::makeSure($dir, $nama);
    }

    protected static function makeSure(string $dir, string $nama): void
    {
        if (file_exists($dir . "/" . $nama . ".php")) {
            echo "\n\e[0;101m Hati-hati! \e[0m\nYakin ingin menghapus file " . $nama . ".php?\e[0m\n";
            echo "Ketik [\e[0;32mYa\e[0m] untuk menghapus file\e[0m\n";
            echo "Tekan [\e[0;32mEnter\e[0m] untuk membatalkan\e[0m\n";
            echo "Pilihan anda : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "Y" || $jawab == "ya" || $jawab == "y" || $jawab == "Yes" || $jawab == "yes") {
                unlink($dir . "/" . $nama . ".php");
                echo "\n\e[0m\e[0;101m Dihapus! \e[0m\n";
                echo "\e[0;36mLokasi:\e[0m \e[9mschema/" . $nama . ".php\e[0m\n\n";
                die();
            } else {
                echo "\n\e[0m\e[0;101m Dibatalkan! \e[0m\n\n";
                die();
            }
        } else {
            echo "\n\e[0m\e[0;101m file " . $nama . ".php Tidak ditemukan! \e[0m\n\n";
            die();
        }
    }

}