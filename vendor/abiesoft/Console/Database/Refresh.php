<?php 

namespace Abiesoft\Resources\Console\Database;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Utilities\Config;

class Refresh {

    public static function run()
    {
        $dir = __DIR__ . "/../../../../schema";
        self::makeSure($dir);
    }

    protected static function makeSure(string $dir): void
    {
        if (Config::env('MODE') === 'running') {
            echo "\n\e[0;101m Hati-hati! \e[0m\nAplikasi ini sudah running secara online. Tetap lanjutkan?\e[0m\n";
            echo "Ketik [\e[0;32mYa\e[0m] untuk melanjutkan import\e[0m\n";
            echo "Tekan [\e[0;32mEnter\e[0m] untuk membatalkan\e[0m\n";
            echo "Pilihan anda : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "Y" || $jawab == "ya" || $jawab == "y" || $jawab == "Yes" || $jawab == "yes") {
                echo "\n";
                self::hapus($dir);
                die();
            } else {
                echo "\n\e[0m\e[0;101m Dibatalkan! \e[0m\n\n";
                die();
            }
        } else {
            echo "\n";
            self::hapus($dir);
            die();
        }
    }

    protected static function hapus(string $dir): void
    {
        $cektabel = DB::terhubung()->query("SELECT * FROM information_schema.tables WHERE table_schema = '" . Config::env('DBS_NAME') . "' ");
        if ($cektabel->hitung()) {
            foreach ($cektabel->hasil() as $ct) {
                if ($ct->TABLE_NAME != 'migrasi') {
                    $drop = DB::terhubung()->query("DROP TABLE {$ct->TABLE_NAME}");
                    if ($drop) {
                        DB::terhubung()->hapus('migrasi', array(
                            'tabel', '=', $ct->TABLE_NAME
                        ));
                        if($ct->TABLE_NAME != 'token'){
                            echo "-- Tabel \e[31m\e[9m" . $ct->TABLE_NAME . "\e[0m\e[39m sudah dihapus. \n";   
                        }
                    }
                }
            }
            self::proses($dir);
        }
    }

    protected static function proses(string $dir): void
    {
        $statusimport = "";
        $total = 0;
        $cektabelmigrasi = DB::terhubung()->query("SELECT * FROM information_schema.tables WHERE table_schema = '" . Config::env('DBS_NAME') . "' AND table_name = 'migrasi'");

        if ($cektabelmigrasi->hitung()) {
            foreach (scandir("./schema") as $fs => $file) {
                if ($fs != 0 and $fs != 1 and $file != "migrasi.php") {
                    $cekmigrasi = DB::terhubung()->query("SELECT * FROM migrasi WHERE tabel = '" . explode('.', $file)[0] . "' ");
                    if (!$cekmigrasi->hitung()) {
                        $input = DB::terhubung()->input("migrasi", array(
                            "tabel" => explode('.', $file)[0]
                        ));
                        if ($input) {
                            include "./schema/" . $file;
                            $total++;
                            if ($fs == count(scandir("./schema")) - 1) {
                                echo "-- Tabel \e[32m" . explode('.', $file)[0] . "\e[39m sudah diimport. \n";
                                $statusimport = "\n\e[0;102m Sukses! \e[0m\n\e[0;36mTotal:\e[0m " . $total . " tabel \n\n";
                            } else {
                                echo "-- Tabel \e[32m" . explode('.', $file)[0] . "\e[39m sudah diimport. \n";
                            }
                        }
                        include_once __DIR__ . "/../Schema/token.php";
                    } else {
                        if ($total === 0) {
                            $statusimport = "\n\e[0;102m Tidak Ada Tabel Yang Diimport! \e[0m\n\e[0;36m\e[0m \n\n";
                        } else {
                            $statusimport = "\n\e[0;102m Sukses! \e[0m\n\e[0;36mTotal:\e[0m " . $total . " tabel \n\n";
                        }
                    }
                }
            }
            echo $statusimport;
        } else {
            include_once __DIR__ . "/../Schema/migrasi.php";
            include_once __DIR__ . "/../Schema/token.php";
            self::proses($dir);
        }
    }

}