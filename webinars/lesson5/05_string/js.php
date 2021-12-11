<?php
if (isset($_GET['message'])) {
    echo 'Выводим полученный методом GET параметр<br/>';
    echo $_GET['message'];
    echo 'с применением функции htmlspecialchars<br/>';
    echo htmlspecialchars($_GET['message'], ENT_HTML5, 'UTF-8'), '<br/>';
    echo 'с применением функции strip_tags<br/>';
    echo strip_tags($_GET['message']), '<br/>';

} else {
    $s='<script>alert("HELLO")</script>';
    $url_s=urlencode($s);
    echo 'Запросите страницу с параметром:<br/>';
    echo 'message='.$url_s;
}
