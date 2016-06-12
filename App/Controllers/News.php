<?php

namespace App\Controllers;

use App\View;


class News
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $methodName = 'action'.$action;
        return $this->{$methodName}();

    }
    
    protected function actionIndex()
    {
        $this->view->title = 'Мой заголовок';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }
    protected function actionOne($id)
    {

        $this->view->title = 'Мой заголовок';
        $this->view->news = \App\Models\News::findById((int) $id);
        $this->view->display(__DIR__ . '/../templates/index.php');
    }
}
