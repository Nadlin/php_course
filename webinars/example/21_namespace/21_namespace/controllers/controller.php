<?php

namespace controllers;


class controller
{
    private $page = 'page1';//имя страницы по умолчанию page1
    private $action = 'read';//CRUD-операции, по умолчанию read
    private $parameters;//массив остальных параметров запроса

    public function __construct()
    {
        $this->analyzeRequest();// например index.php?page=page1&action=read&number=1
    }

    protected function analyzeRequest()
    {
        $this->parameters = $_GET;
        if (!empty($this->parameters['page'])) $this->page = $this->parameters['page'];
        unset($this->parameters['page']);
        if (!empty($this->parameters['action'])) $this->page = $this->parameters['action'];
        unset($this->parameters['action']);
    }

    public function run()
    {
        $className = '\\models\\' . $this->page;//имя класса модели с пространством имен (например /models/page1)
        $model = new $className();//создаем объект нужной модели
        $model->execute($this->action, $this->parameters);
        $className = '\\views\\' . $this->page;//имя класса view с пространством имен (например /views/page1)
        $view = new $className();
        $view->render($model->getData());
    }
}