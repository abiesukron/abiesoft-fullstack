<?php

namespace Abiesoft\Resources\Collection\Get;

use Abiesoft\Resources\Mysql\DB;

trait All {

    public static function all(string $tabel = "", string $select = "*", string $orderby = "id", bool $sort = true, string $opsi = "", int $limit = 0, string $output = "")
    {

        $forTabel = self::tabel($tabel);
        $forSelect = self::select($select);
        $forOrder = self::orderby($orderby);
        $forSort = self::sort($sort);
        $forLimit = self::limit($limit);

        $sql = "SELECT {$forSelect}  FROM  {$forTabel} {$forOrder} {$forSort} {$forLimit}";

        $cek = DB::terhubung()->query($sql);

        return self::output($forSelect,$cek,$opsi,$output);
    }

}