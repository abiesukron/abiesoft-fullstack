<?php 

namespace Abiesoft\Resources\Mysql;

class Schema {

    private array $schema = [];

    protected function teks(string $nama, int $panjang = 255, string $default = "", bool $null = true, bool $unique = false)
    {

        if ($null == true) {
            $null = " NULL ";
        } else {
            $null = " NOT NULL ";
        }

        if ($default == "") {
            $default = "DEFAULT NULL";
        } else {
            $default = " DEFAULT '" . $default . "'";
        }

        if ($unique) {
            $unique = " UNIQUE";
        }

        return $this->schema[$nama] =  $nama .  " VARCHAR(" . $panjang . ") " . $null . $default . $unique;
    }

    protected function paragrap(string $nama, bool $null = true)
    {

        if ($null == true) {
            $null = " NULL ";
        } else {
            $null = " NOT NULL ";
        }

        return $this->schema[$nama] = $nama .  " TEXT " . $null;
    }

    protected function tanggal(string $nama, bool $null = true)
    {
        if ($null == true) {
            $null = " NULL ";
        } else {
            $null = " NOT NULL ";
        }

        return $this->schema[$nama] = $nama .  " DATETIME " . $null;
    }

    protected function angka(string $nama, int $panjang = 11, int $default = 0, bool $null = true, bool $unique = false)
    {
        if ($null == true) {
            $null = " NULL ";
        } else {
            $null = " NOT NULL ";
        }

        if ($default != 0) {
            $default = "DEFAULT " . $default;
        } else {
            $default = " DEFAULT " . 0;
        }

        if ($unique) {
            $unique = " UNIQUE";
        }

        return $this->schema[$nama] = $nama .  " INT(" . $panjang . ") "  . $null . $default . $unique;
    }

    protected function enum(string $nama, array $data = [], string $default = "")
    {

        if ($default == "") {
            $default = " NULL DEFAULT NULL";
        } else {
            $default = " NOT NULL DEFAULT '" . $default . "'";
        }

        $set = "";
        $dataterakhir = count($data) - 1;
        for ($i = 0; $i < count($data); $i++) {
            if ($i == $dataterakhir) {
                $set .= "'" . $data[$i] . "'";
            } else {
                $set .= "'" . $data[$i] . "',";
            }
        }

        return $this->schema[$nama] =  $nama .  " ENUM(" . $set . ") " . $default;
    }

    protected function boolean(string $nama, bool $default = false)
    {
        if ($default == true) {
            $default = "DEFAULT " . 1;
        } else {
            $default = " DEFAULT " . 0;
        }

        return $this->schema[$nama] = $nama . " BOOL NOT NULL " . $default;
    }

    protected function create(string $tabel)
    {
        $generateSchema = "";
        foreach ($this->schema as $schema) {
            $generateSchema .= $schema . ", ";
        }

        $sql = "CREATE TABLE " . $tabel . " (
            id INT(11) UNIQUE PRIMARY KEY AUTO_INCREMENT,
            " . $generateSchema . "
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP,
            diupdate DATETIME NULL
        )";

        return $sql;
    }

}