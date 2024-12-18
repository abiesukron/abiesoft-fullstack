<?php

namespace Abiesoft\Resources\Collection\Post;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Utilities\Config;

trait PostOption {

    protected static function cekFormElement()
    {
        $formData = [];

        if($_FILES){
            return self::elementWithFiles();
        }else{
            return self::elementWithoutFiles();
        }

        return $formData;
    }

    protected static function elementWithFiles()
    {
        $formItem = [];
        $formData = [];
        $nama_kolom_file = [];
        foreach($_FILES as $k => $v){
            $nama_kolom_file[$k] = self::verifikasiFile($v);
        }
        $formData['files'] = $nama_kolom_file;
        $formData['text'] = $_POST;

        $formItem = array_merge($formData['text'],$formData['files']);

        return $formItem;
    }

    protected static function verifikasiFile($value)
    {
        $dir = __DIR__."/../../../../".Config::env('PUBLIC_FOLDER')."/assets/storage/";

        $file = $dir . basename($value["name"]);
        $namafile = $value["name"];

        if($namafile != ""){
            $tmp = $value["tmp_name"];
            $tipe = strtolower(pathinfo($file,PATHINFO_EXTENSION));
            $size = $value["size"];

            $jenisFile = self::fileTipe($tipe);
            if($jenisFile != "dokumen" and $jenisFile != "image" and $jenisFile != "media"){
                die($jenisFile);
            }
            
            $ukuranFile = self::fileSize($jenisFile,$size);
            if(is_string($ukuranFile)){
                die($ukuranFile);
            }

            $exist = self::fileExist($dir,$jenisFile,$namafile,$tmp);

            $result = "";
            if($exist != "gagal"){
                $result = $exist;
            }else{
                die($exist);
            }
        }else{
            $result = "";
        }

        return $result;
    }

    protected static function fileTipe($tipe)
    {
        $result = "Tipe file ".$tipe." tidak diijinkan.";

        if(in_array($tipe, explode(",",Config::env('TIPE_IMAGE')))) {
            $result = "image";
        }

        if(in_array($tipe, explode(",",Config::env('TIPE_MEDIA')))) {
            $result = "media";
        }

        if(in_array($tipe, explode(",",Config::env('TIPE_DOKUMEN')))) {
            $result = "dokumen";
        }

        return $result;
    }

    protected static function fileSize($jenisFile,$size)
    {
        if(Config::env('SIZE_'.strtoupper($jenisFile)) < $size){
            return "Ukuran file melebihi batas ketentuan. ".Config::env('SIZE_'.strtoupper($jenisFile));
        }else{
            return true;
        }
    }

    protected static function fileExist($dir,$folder,$nama,$tmp)
    {
        $namabaru = rand("0000","9999").str_replace(" ","", $nama);
        if(file_exists($dir.$folder."/".$namabaru)){
            die("File ".$namabaru. " sudah ada di folder ".$folder);
        }

        $target = $dir.$folder."/".$namabaru;
        $upload = move_uploaded_file($tmp, $target);

        $lokasifile = "gagal";
        if($upload){
            $lokasifile = "assets/storage/".$folder."/".$namabaru;
        }


        return $lokasifile;
    }

    protected static function elementWithoutFiles()
    {
        $formItem = [];
        $formItem = $_POST;
        return $formItem;
    }

    protected static function sudahada($tabel, $formItem)
    {
        $item = "";
        $jl = 1;
        foreach($formItem as $k => $v){
            if(count($formItem) == $jl){
                $item .= "".$k." ='".$v."'";
            }else{
                $item .= "".$k." ='".$v."' AND ";
            }
            $jl++;
        }

        $sql = "SELECT id FROM ".$tabel." WHERE ".$item." ";
        
        $cek = DB::terhubung()->query($sql);
        if($cek->hitung()){
            return true;
        }

        return false;
    }

    protected static function databaru($tabel, $formItem)
    {
        $item = "";
        $jl = 1;
        foreach($formItem as $k => $v){
            if(count($formItem) == $jl){
                $item .= "".$k." ='".$v."'";
            }else{
                $item .= "".$k." ='".$v."' AND ";
            }
            $jl++;
        }

        $sql = "SELECT * FROM ".$tabel." WHERE ".$item." ";
        
        $cek = DB::terhubung()->query($sql);
        if($cek->hitung()){
            return $cek->hasil();
        }

        return false;
    }

    protected static function databyid($tabel, $id)
    {
        $sql = "SELECT * FROM ".$tabel." WHERE id='".$id."' ORDER BY id LIMIT 1 ";
        
        $cek = DB::terhubung()->query($sql);
        if($cek->hitung()){
            return $cek->hasil();
        }

        return false;
    }

}