<?php 

namespace Abiesoft\Resources\Console\Database;

use Abiesoft\Resources\Mysql\DB;

class Restore {

    public static function run()
    {
        $dir = __DIR__ . "/../../../../backup";
        if (file_exists($dir)) {
            echo "\n\e[0m\e[0;101m Hati-hati! \e[0m";
            echo "\n\e[0mMerestore data akan menimpa data yang lama. Jika anda mengerti,\e[0m";
            echo "\n\e[0mSilahkan pilih data yang akan direstore.\e[0m\n";
            if (count(scandir($dir)) > 2) {
                $no = -1;
                foreach (scandir($dir) as $d) {
                    if ($d != "." and $d != "..") {
                        echo "[\e[0;32m$no\e[0m] $d\e[0m\n";
                    }
                    $no++;
                }
                echo "Tekan [\e[0;32mEnter\e[0m] untuk membatalkan\e[0m\n";
                echo "Angka pilihan anda : ";
                $formjawab = fopen("php://stdin", "r");
                $jawab = trim(fgets($formjawab));
                if (is_numeric($jawab)) {
                    return self::pilihan($jawab);
                } else {
                    echo "\n\e[0m\e[0;101m Dibatalkan! \e[0m\n\n";
                    die();
                }
            } else {
                echo "\n\e[0m\e[0;101m Belum ada data yang dibackup! \e[0m\n\n";
                die();
            }
        } else {
            echo "\n\e[0m\e[0;101m Belum ada data yang dibackup! \e[0m\n\n";
            die();
        }
    }

    public static function pilihan($angka)
    {
        $dir = __DIR__ . "/../../../../backup";
        $no = -1;
        foreach (scandir($dir) as $d) {
            if ($d != "." and $d != "..") {
                if ($no == $angka) {
                    self::restoreData($d);
                }
            }
            $no++;
        }
    }

    public static function restoreData($folder)
    {
        $isifolder = __DIR__ . "/../../../../backup/" . $folder;
        $no = 3;
        echo "\n";
        foreach (scandir($isifolder) as $i => $v) {
            if ($v != "." and $v != "..") {
                $tabel = explode(".", $v)[0];
                $hpstabel = DB::terhubung()->query("DROP TABLE " . $tabel . " ");
                if ($hpstabel) {
                    include_once $isifolder . "/" . $v;
                    echo "-- Tabel \e[32m" . $tabel . "\e[39m sudah direstore. \n";
                }
                if ($no == count(scandir($isifolder))) {
                    $total = count(scandir($isifolder)) - 2;
                    echo "\n\e[0;102m Sukses! \e[0m\n\e[0;36mTotal:\e[0m " . $total . " tabel dipulihkan\n\n";
                }
                $no++;
            }
        }
    }

}