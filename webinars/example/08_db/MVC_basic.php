<?php
class Controller
{
    private $model;
    private $view;
    private $requestParameters;

    private function setRequestParameters()
    {
        $this->requestParameters = $_SERVER['HTTP_USER_AGENT'];
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

    private function setData()
    {
        $this->data = 'Текст страницы';//реально получаем из файла, БД
    }

    public function execute()
    {
        $this->setData();
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
        echo $this->model->getRequestParameters(), '<br>';
        echo $this->model->getData();
    }
}

$controller = new Controller();
$controller->run();
