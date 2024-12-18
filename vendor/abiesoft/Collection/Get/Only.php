<?php

namespace Abiesoft\Resources\Collection\Get;

use Abiesoft\Resources\Mysql\DB;

trait Only {

    public static function only(string $tabel = "", string $select = "*", string $orderby = "id", bool $sort = false, string $id = "", string $output = "")
    {
        $forTabel = self::tabel($tabel);
        $forSelect = self::select($select);
        $forOrder = self::orderby($orderby);
        $forSort = self::sort($sort);
        $forID = self::id($id);

        $sql = "SELECT {$forSelect}  FROM  {$forTabel} WHERE {$forID} {$forOrder} {$forSort} LIMIT 1 ";
        $cek = DB::terhubung()->query($sql);

        return self::output($forSelect,$cek,"",$output);
    }

}