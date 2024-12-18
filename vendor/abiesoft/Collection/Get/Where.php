<?php

namespace Abiesoft\Resources\Collection\Get;

use Abiesoft\Resources\Mysql\DB;

trait Where {

    /*
        Contoh Penggunaan
        return Test::where(output:'json', where:[
            'kolom1' => '!|null',
            'kolom2' => '!|',
            'kolom3' => 'foo',
            'kolom4' => '>|0',
            'kolom5' => '<|1',
            'kolom6' => 'like|%a%',
            'kolom7' => 'in|foo,foo,foo',
            'kolom8' => 'between|foo,foo'
        ]);

        kolom1 != 'null' AND kolom2 != '' AND kolom3 = 'foo' AND kolom4 > 0 AND kolom5 < 1 AND kolom6 LIKE '%a%' AND kolom7 IN('foo','foo','foo') AND kolom8 BETWEEN 'foo' AND 'foo'
    */
    public static function where(string $tabel = "", string $select = "*", string $orderby = "id", bool $sort = false, string $opsi = "", array $where = [], $limit = 0, string $output = "")
    {
        $forTabel = self::tabel($tabel);
        $forSelect = self::select($select);
        $forOrder = self::orderby($orderby);
        $forSort = self::sort($sort);
        $forWhere = self::setWhere($where);
        $forLimit = self::limit($limit);

        $sql = "SELECT {$forSelect}  FROM  {$forTabel} WHERE {$forWhere} {$forOrder} {$forSort} {$forLimit} ";
        $cek = DB::terhubung()->query($sql);

        return self::output($forSelect,$cek,$opsi,$output);
    }

}