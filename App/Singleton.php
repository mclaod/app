<?php
namespace App;

trait Singleton
{
    protected static $instance;

    protected function __construct()
    {
        
    }

    public static function instance()
    {
        if(empty($instance))
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
}