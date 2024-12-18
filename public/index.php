<?php
ini_set('memory_limit', '-1');
date_default_timezone_set("Asia/Bangkok");

require_once __DIR__."/../vendor/autoload.php";
use Abiesoft\Resources\Sistem;

$app = new Sistem;
$app->start();