<?php
function menu($level)
{
    if ($level > 5) return;
    echo '<ul>';
    echo '<li>';
    echo $level;
    menu($level + 1);
    echo '</li>';
    echo '</ul>';
}
menu(1);