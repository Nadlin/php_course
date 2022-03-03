<?php

namespace views;


class page3 implements view
{
    public function render($data)
    {
        echo 'PAGE 3<br/>';
        echo $data . '<br/>';
        echo '<a href="index.php?page=page1">page 1</a> <a href="index.php?page=page2">page 2</a>';
    }
}