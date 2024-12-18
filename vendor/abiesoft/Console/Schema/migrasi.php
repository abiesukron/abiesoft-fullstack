<?php

namespace Abiesoft\Resources\Console\Schema;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Mysql\Schema;

class migrasi extends Schema
{
    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks(nama: 'tabel');
        $sql = $schema->create('migrasi');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('migrasi', [
                'nama' => '',
            ]);
        */
    }
}
$create = new migrasi();
$create->buattabel();
