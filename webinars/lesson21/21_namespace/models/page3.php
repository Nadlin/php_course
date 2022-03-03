<?php

namespace models;


class page3 extends model
{
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
        $this->data = 'Данные страницы page3';
    }
}