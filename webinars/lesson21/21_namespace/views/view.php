<?php

namespace views;


interface view//интерфейс для всех видов определяет обязательную функцию render
{
    public function render($data);
}