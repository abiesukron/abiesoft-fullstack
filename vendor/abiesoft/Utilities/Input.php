<?php 

namespace Abiesoft\Resources\Utilities;

class Input {

    public static function metode(string $tipe = 'post'): bool
    {
        switch ($tipe) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }

    public static function get(string $item): string
    {
        if (isset($_POST[$item])) {
            return htmlspecialchars($_POST[$item], double_encode: false);
        } else if (isset($_GET[$item])) {
            return htmlspecialchars($_GET[$item], double_encode: false);
        } else {
            return "";
        }
    }

    public static function file(string $item, string $tipe): string
    {
        if (isset($_FILES[$item][$tipe])) {
            return $_FILES[$item][$tipe];
        } else {
            return '';
        }
    }

}