<?php

namespace models;


class page1 extends model
{
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
        $this->data = 'Данные страницы page1';
    }
}