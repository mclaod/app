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


/*$action = ($_GET['action'])?:'Index';

$controller = new \App\Controllers\News();
$controller->action($action);*/


$user = Models\User::findById(11);
var_dump($user);
$user->name = 'DimaM';
$user->email = 'email1@gmail.com';
echo $user->update();


//require __DIR__.'/App/templates/index.php';