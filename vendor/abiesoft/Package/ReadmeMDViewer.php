<?php 

namespace Abiesoft\Resources\Package;

use Parsedown;

class ReadmeMDViewer {

    public static function textToHtml ($text) {
        $parsedown = new Parsedown();
        $html = $parsedown->text($text);

        return $html;
    }

}