<?php

namespace Abiesoft\Resources\Console\Schema;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Mysql\Schema;

class token extends Schema
{
    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks('csrf');
        $schema->teks('device');
        $schema->teks('ip');
        $sql = $schema->create('token');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('token', [
                'nama' => '',
            ]);
        */
    }
}
$create = new token();
$create->buattabel();
