<?php

namespace views;


class page2 implements view
{
    public function render($data)
    {
        echo 'PAGE 2<br/>';
        echo $data . '<br/>';
        echo '<a href="index.php?page=page1">page 1</a> <a href="index.php?page=page3">page 3</a>';
    }
}