<?php

namespace Abiesoft\Resources\Collection\Get;

use Abiesoft\Resources\Mysql\DB;

trait Join {


    /*
        Contoh Penggunaan
        echo Test::join(
            select:[
                'test.noregskm',
                'test.tglsurat',
                'polda.nama as namapolda',
                'kategori.nama as namakategori'
            ],
            tabel: 'test',
            join: [
                'polda' => [
                    'polda.id' => 'test.poldaid'
                ],
                'kategori' => [
                    'kategori.id' => 'test.kategoriid'
                ]
            ],
            output:'json',
            limit:10,
            where:[
                'polda.nama' => 'Polda Jawa Barat'
            ],
            tipe:'full'
        );
    
    */
    public static function join(
        array $select = [],
        string $tabel = "",
        array $join = [],
        array $where = [],
        string $orderby = "", 
        bool $sort = true, 
        string $opsi = "", 
        int $limit = 0, 
        string $output = "",
        string $tipe = "",
    )
    {
        $forSelect = self::select($select);
        $forTabel = self::tabel($tabel); 
        $forJoin = self::setJoin($join,$tipe);
        $forOrder = self::setOrder($orderby);
        $forSort = self::sort($sort);
        $forLimit = self::limit($limit);

        $forWhere = "";
        if(count($where) > 0){
            $forWhere = " WHERE ".self::setWhere($where);
        }

        $sql = "
            SELECT 
                ".$forSelect."
            FROM ".$forTabel."
            ".$forJoin."
            ".$forWhere."
            ".$forOrder."
            ".$forSort."
            ".$forLimit."
        ";
        
        $cek = DB::terhubung()->query($sql);

        return self::output($forSelect,$cek,$opsi,$output);
    }

}