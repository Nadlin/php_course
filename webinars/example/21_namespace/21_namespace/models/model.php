<?php

namespace models;


class model//базовый класс для всех моделей опрелеяет обязательные функции run и getData
{
    protected $action;
    protected $data;
    protected $parameters;

    public function __construct()
    {
    }

    public function execute($action, $parameters)
    {
        $this->action = $action;
        $this->parameters = $parameters;
    }

    public function getData()
    {
        return $this->data;
    }
}