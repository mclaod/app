<?php
namespace App;

class View
{

    protected $data = array();

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function display($template)
    {
        include $template;
    }


}