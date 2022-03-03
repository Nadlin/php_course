<?php

namespace models;


class page2 extends model
{
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
        $this->data = 'Данные страницы page2';
    }
}