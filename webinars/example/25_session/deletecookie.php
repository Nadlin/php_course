<?php
if (!empty($_COOKIE['mycookie']))
{
    setcookie('mycookie', '');
    setcookie('other', '', time() - 3600);
    echo('Cookie удалены');
}
