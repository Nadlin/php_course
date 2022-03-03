<?php


class View
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $items = $this->model->getData();
        $qty = count($items);
        $param = $this->model->getParameters();
        $user = \Model\Session::getUserId();
        include 'template/index.phtml';
    }

    public function renderLoginPage()
    {
        include 'template/main.phtml';
    }

    public function createItem()
    {
        $item = $this->model->getData()[0];
        header("Content-type: text/plain; charset=UTF-8");
        include 'template/item.php';
    }

    public function editItem()
    {
        $item = $this->model->getData()[0];
        $item['task'] = htmlspecialchars_decode($item['task'], ENT_QUOTES | ENT_HTML5);
        $item['comment'] = htmlspecialchars_decode($item['comment'], ENT_QUOTES | ENT_HTML5);
        header("Content-type: application/json; charset=utf-8");
        $answer = json_encode($item);
        echo $answer;
    }

    public function deleteItem()
    {
        header("Content-type: application/json; charset=utf-8"); // &
        $answer = json_encode('');
        echo $answer;
    }
}