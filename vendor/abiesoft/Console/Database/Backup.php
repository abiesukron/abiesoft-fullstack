<?php 

namespace Abiesoft\Resources\Console\Database;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Utilities\Config;

class Backup {

    public static array $tabel = [];
    public static function run()
    {
        echo "\e[0m\nNama backup datanya apa?\e[0m\n";
        echo "Ketik nama backup (nama tidak menggunakan spasi), atau\e[0m\n";
        echo "Tekan [\e[0;32mEnter\e[0m] untuk melanjutkan dengan nama default\e[0m\n";
        echo "Nama backup : ";

        $formjawab = fopen("php://stdin", "r");
        $jawab = trim(fgets($formjawab));
        if ($jawab != "" and $jawab != " " and $jawab != "  " and $jawab != "   ") {
            $namabackupan = $jawab;
        } else {
            $namabackupan = "default";
        }

        self::checkTabel();
        self::makeSchema($namabackupan);
    }

    protected static function checkTabel()
    {
        $dname = Config::env('DBS_NAME');
        $cektabel = DB::terhubung()->query("SELECT * FROM information_schema.tables WHERE table_schema = '" . $dname . "' ");
        if ($cektabel->hitung()) {
            foreach ($cektabel->hasil() as $ct) {
                if ($ct->TABLE_NAME != "migrasi" and $ct->TABLE_NAME != "token" and $ct->TABLE_NAME != "seting") {
                    $cekdata = DB::terhubung()->query("SELECT * FROM $ct->TABLE_NAME ")->hitung();
                    if ($cekdata) {
                        self::$tabel[] = $ct->TABLE_NAME;
                    }
                }
            }
        }
    }

    protected static function makeSchema($namabackupan)
    {
        echo "\n";
        if (count(self::$tabel)) {
            for ($i = 0; $i < count(self::$tabel); $i++) {
                self::makeBackup(self::$tabel[$i], $i, $namabackupan);
            }
        }
    }

    protected static function makeBackup($tabel, $j, $namabackupan)
    {
        date_default_timezone_set("Asia/Bangkok");
        $jl = count(self::$tabel) - 1;
        $total = $jl + 1;
        $nama = $tabel;
        $namafolderBackup = "";
        for ($nf = 0; $nf < count(explode(" ", Config::env('APP_NAME'))); $nf++) {
            $namafolderBackup .= strtolower(str_replace(".", "", explode(" ", Config::env('APP_NAME'))[$nf]));
        }
        $namafolderBackup = $namafolderBackup;

        if ($namabackupan == "default") {
            $namafilebackup = $namafolderBackup . "_" . date('d_m_Y_H');
        } else {
            $namafilebackup = $namabackupan;
        }

        $fbc = __DIR__ . "/../../../../backup/";
        if (!file_exists($fbc)) {
            mkdir($fbc, 0777, false);
        }

        $dir = __DIR__ . "/../../../../backup/" . $namafilebackup;
        if (!file_exists($dir)) {
            mkdir($dir, 0777, false);
        }


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



        $cekkolom = DB::terhubung()->query("SELECT * FROM information_schema.columns WHERE table_schema = '" . Config::env('DBS_NAME') . "' AND table_name = '" . $tabel . "' ")->hasil();

        foreach ($cekkolom as $k) {

            // print_r($k);
            if ($k->COLUMN_NAME !== "id" and $k->COLUMN_NAME !== "dibuat" and $k->COLUMN_NAME !== "diupdate") {
                if ($k->DATA_TYPE == "varchar") {
                    $namakolom = $k->COLUMN_NAME;
                    $panjang = $k->CHARACTER_MAXIMUM_LENGTH;
                    if ($panjang != 255) {
                        $panjang = ", panjang: " . $panjang;
                    } else {
                        $panjang = "";
                    }

                    $default = $k->COLUMN_DEFAULT;
                    if ($default != "") {
                        $default = ", default: '" . $default . "'";
                    } else {
                        $default = "";
                    }
                    $unique = "";
                    if ($k->COLUMN_KEY == "UNI") {
                        $unique = ", unique:true";
                    }

                    $null = "";
                    if ($k->IS_NULLABLE != "YES") {
                        $null = ", null:false";
                    }
                    $isi = "        $" . "" . "schema->teks(nama:'" . $namakolom . "'$panjang$default$unique$null);\n";
                    fwrite($file, $isi);
                }

                if ($k->DATA_TYPE == "int") {
                    $namakolom = $k->COLUMN_NAME;
                    $default = $k->COLUMN_DEFAULT;
                    if ($default != "") {
                        $default = ", default: " . $default;
                    } else {
                        $default = "";
                    }
                    $null = "";
                    if ($k->IS_NULLABLE != "YES") {
                        $null = ", null:false";
                    }
                    $isi = "        $" . "" . "schema->angka(nama:'" . $namakolom . "'$default$null);\n";
                    fwrite($file, $isi);
                }

                if ($k->DATA_TYPE == "text") {
                    $namakolom = $k->COLUMN_NAME;
                    $null = "";
                    if ($k->IS_NULLABLE != "YES") {
                        $null = ", null:false";
                    }
                    $isi = "        $" . "" . "schema->paragrap(nama:'" . $namakolom . "'$null);\n";
                    fwrite($file, $isi);
                }

                if ($k->DATA_TYPE == "datetime") {
                    $namakolom = $k->COLUMN_NAME;
                    $null = "";
                    if ($k->IS_NULLABLE != "YES") {
                        $null = ", null:false";
                    }
                    $isi = "        $" . "" . "schema->tanggal(nama:'" . $namakolom . "'$null);\n";
                    fwrite($file, $isi);
                }

                if ($k->DATA_TYPE == "enum") {
                    $namakolom = $k->COLUMN_NAME;
                    $kolomtype = str_replace(")", "", str_replace("enum(", "", $k->COLUMN_TYPE));
                    $isi = "        $" . "" . "schema->enum(nama:'" . $namakolom . "', data:[" . $kolomtype . "]);\n";
                    fwrite($file, $isi);
                }

                if ($k->DATA_TYPE == "tinyint" || $k->DATA_TYPE == "boolean") {
                    $namakolom = $k->COLUMN_NAME;
                    $default = $k->COLUMN_DEFAULT;
                    if ($default != "") {
                        $default = ", default: " . $default;
                    } else {
                        $default = "";
                    }
                    $kolomtype = str_replace(")", "", str_replace("enum(", "", $k->COLUMN_TYPE));
                    $isi = "        $" . "" . "schema->boolean(nama:'" . $namakolom . "'$default);\n";
                    fwrite($file, $isi);
                }
            }
        }


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

        $isitabel = DB::terhubung()->query("SELECT * FROM $tabel");
        foreach ($isitabel->hasil() as $k => $v) {
            $isi = "        \n";
            fwrite($file, $isi);
            $isi = "        DB::terhubung()->input('" . $nama . "', [\n";
            fwrite($file, $isi);
            foreach ($v as $vk => $vv) {
                if ($vv != "") {
                    if (is_string($vv)) {
                        $isi = "            '" . $vk . "' => '" . str_replace("'", "\'", $vv) . "',\n";
                        fwrite($file, $isi);
                    } else {
                        $isi = "            '" . $vk . "' => " . str_replace("'", "\'", $vv) . ",\n";
                        fwrite($file, $isi);
                    }
                }
            }
            $isi = "        ]);\n";
            fwrite($file, $isi);
        }

        $isi = "    }\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);

        $isi = "$" . "" . "create = new " . $nama . "();\n";
        fwrite($file, $isi);
        $isi = "$" . "" . "create->buattabel();\n";
        fwrite($file, $isi);
        fclose($file);

        echo "-- Tabel \e[32m" . $nama . "\e[39m sudah dibackup. \n";

        if ($j == $jl) {
            echo "\n\e[0;102m Backup Selesai! \e[0m\n\e[0;36mTotal:\e[0m " . $total . " tabel \n\e[0m\e[0;36mLokasi:\e[0m backup/" . $namafilebackup . " \n\n";
        }
    }

}