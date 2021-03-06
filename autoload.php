<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 04.05.2016
 * Time: 16:31
 */

function my_app_autoload($class)
{
    include __DIR__ . '\\' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_app_autoload');

spl_autoload_register(function ($class) {
    include __DIR__ . '\\' . str_replace(['\\', 'App'], ['/', 'lib'], $class) . '.php';
});


function dump($var, $die = false, $all = false, $need_return = false)
{
    global $USER;


    $result = '<pre>' . print_r($var, true) . '</pre><br>';

    $debug = debug_backtrace(false); // В ознакомительных целях потом можео попробовать с true
    var_dump('File: ' . $debug[0]['file'] . '.Line: ' . $debug[0]['line']);
    if ($need_return) {
        return $result;
    } else {
        echo $result;
    }

    if ($die) {
        die;
    }
}