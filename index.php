<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 04.05.2016
 * Time: 16:31
 */
use \App\Models;
use \App\Controllers;

require __DIR__.'/autoload.php';


$action = ($_GET['action'])?:'Index';

$controller = new \App\Controllers\News();
$controller->action($action);



//require __DIR__.'/App/templates/index.php';