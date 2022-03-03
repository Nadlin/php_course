<?php
// index.php?page=main&action=read&num=5
// index.php?page=news&action=read&num=5&year=2021
// main/read/num/5
// news/read/num/5/year/2021

// 1. Разобрать параметры  Controller
// 2. Обработка данных  Model
// 3. Сформировать страницу  View
// MVC

class Controller
{
    private $model;
    private $view;
    private $requestParameters;

    private function setRequestParameters()
    {
        $this->requestParameters = $_GET;
    }

    public function run()
    {
        $this->setRequestParameters();
        $this->model = new Model($this->requestParameters);
        $this->model->execute();
        $this->view = new View($this->model);
        $this->view->render();
    }
}

class Model
{
    private $data;
    private $requestParameters;

    public function __construct($requestParameters)
    {
        $this->requestParameters = $requestParameters;
    }

    private function readData()
    {
        $this->data = 'Текст страницы';//реально получаем из файла, БД
    }

    public function execute()
    {
        $this->readData();
    }

    public function getData()
    {
        return $this->data;
    }

    public function getRequestParameters()
    {
        return $this->requestParameters;
    }
}

class View
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        var_dump($this->model->getRequestParameters());
        echo $this->model->getData();
    }
}

$controller = new Controller();
$controller->run();
