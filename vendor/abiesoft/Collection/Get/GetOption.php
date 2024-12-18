<?php

namespace Abiesoft\Resources\Collection\Get;

trait GetOption {

    protected static function select(string|array $select)
    {
        if(is_array($select)){
            $result = "";
            for($i=0; $i<count($select); $i++){
                if($i < count($select) -1){
                    $result .= $select[$i] .",";
                }else{
                    $result .= $select[$i];
                }
            }
        }else{
            $result = "*";
            if ($select != "*" || $select = "") {
                $result = $select;
            }
        }
        return $result;
    }

    protected static function orderby(string $orderby = "id")
    {
        $result = " ORDER BY id ";
        if ($orderby != "id") {
            $result = " ORDER BY " . $orderby . " ";
        }
        return $result;
    }

    protected static function setOrder(string $orderby = "")
    {
        $result = "";
        if ($orderby != "") {
            $result = " ORDER BY " . $orderby . " ";
        }
        return $result;
    }

    protected static function sort(bool $sort = false)
    {
        $result = "";
        if ($sort == false) {
            $result = " DESC ";
        }
        return $result;
    }

    protected static function id($id)
    {
        $result = "";
        if (count(explode("|", $id)) > 1) {
            $result = " " . explode("|", $id)[0] . "='" . explode("|", $id)[1] . "' ";
        } else {
            $result = " id='" . $id . "' ";
        }
        return $result;
    }

    protected static function limit($limit = 0)
    {
        $result = "";
        if($limit != 0){
            $result = " LIMIT ".$limit;
        }
        return $result;
    }

    protected static function setWhere($where)
    {
        $result = "";
        $no = 1;
        foreach($where as $key => $value){
            if($no == 1){
                $result .= " $key ".self::valueModel($value);
            }else{
                $result .= " AND $key ".self::valueModel($value);
            }
            $no++;
        }

        return $result;
    }

    protected static function valueModel($value)
    {
        $result = " = '".$value."' ";
        if(isset(explode("|",$value)[1])){
            $result = self::valueModelSimbol(explode("|",$value)[0],explode("|",$value)[1]);
        } else {
            $result = " = '".$value."' ";
        }

        return $result;
    }

    protected static function valueModelSimbol($simbol, $value)
    {
        $in = "";
        $between = "";

        if(count(explode(",",$value)) > 0){
            for($i=0; $i<count(explode(",",$value)); $i++){
                $explode = explode(',',$value)[$i];
                if($i < count(explode(",",$value)) -1){
                    $in .= "'".$explode."',";
                }else{
                    $in .= "'".$explode."'";
                }
            }
        }

        if(isset(explode(",",$value)[1])){
            if(is_numeric(explode(",",$value)[0])){
                $between = " ".explode(",",$value)[0]." AND ".explode(",",$value)[1]." ";
            }else{
                $between = " '".explode(",",$value)[0]."' AND '".explode(",",$value)[1]."' ";
            }   
        }

        return match(strtolower($simbol)){
            "!" => " != '".$value."' ",
            ">" => " > ".intval($value)." ",
            "<" => " < ".intval($value)." ",
            "in" => " IN(".$in.") ",
            "between" => " BETWEEN ".$between." ",
            "like" => " LIKE '".$value."' ",
            default => " = '".$value."' "
        };
        
    }

    protected static function setJoin($join,$tipe)
    {
        $result = "";

        if($tipe == "inner"){
            $joinTipe = " INNER JOIN ";
        } else if($tipe == "left"){
            $joinTipe = " LEFT JOIN ";
        } else if($tipe == "right"){
            $joinTipe = " RIGHT JOIN ";
        } else{
            $joinTipe = " LEFT JOIN ";
        }

        foreach($join as $k => $v){
            $joinOpsi = "";
            foreach($v as $vk => $vv){
                $joinOpsi .= $vk ." = ". $vv;
            }
            $result .= " ".$joinTipe." ".$k . " ON ".$joinOpsi;
        }
        
        return $result;
    }

    protected static function output($select,$cek,$opsi,$output)
    {
        $data = [];
        if ($output == "json") {
            if ($cek->hitung()) {
                $data = $cek->hasil();
            }
            $result = [];
            $result['code'] = 200;
            $result['message'] = "OK";
            $result['data'] = $data;
            if($opsi != ""){
                $result['opsi'] = $opsi;
            }
            echo json_encode($result);
        } else if ($output == "string") {
            if($select == "*" || $select == ""){
                return self::badrequest();
            }else{
                $jlselect = count(explode(",",$select));
                if($jlselect < 2 ){
                    $result = "";
                    foreach ($cek->hasil() as $c) {
                        $result = $c->$select;
                    }
                    if(is_numeric($result)){
                        $result = intval($result);
                    }
                    return $result;
                }else{
                    return self::badrequest();
                }
            }
        } else if ($output == "hitung") {
            return intval($cek->hitung());
        } else {
            return $cek->hasil();
        }
    }

    protected static function badrequest()
    {
        $result = [];
        $result['code'] = 400;
        $result['message'] = "BAD REQUEST";
        echo json_encode($result);
    }

}