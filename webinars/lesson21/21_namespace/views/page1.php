<?php

namespace views;


class page1 implements view
{
    public function render($data)
    {
        echo 'PAGE 1<br/>';
        echo $data . '<br/>';
        echo '<a href="index.php?page=page2">page 2</a> <a href="index.php?page=page3">page 3</a>';
    }
}