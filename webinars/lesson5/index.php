<?php
// https://www.php.net/manual/ru/ref.strings.php  - функции для работы со строками
// однобайтовые кодировки
$str = "Ваше имя O'Reilly?";


echo addslashes($str) . '<br>';
echo nl2br("foo - это вам не\n bar");
$a = chr(27);
echo $a . '<br>';

echo ord('dsvdvsv');

if (isset($_GET['message'])) {
    echo 'Выводим полученный методом GET параметр<br/>';
    echo $_GET['message'];
    echo 'с применением функции htmlspecialchars<br/>';
    echo htmlspecialchars($_GET['message'], ENT_HTML5, 'UTF-8'), '<br/>';
    echo 'с применением функции strip_tags<br/>';
    echo strip_tags($_GET['message']), '<br/>';

} else {
    $s = '<script>alert("Приветик!!!")</script>';
    $url_s = urlencode($s);
    echo '<br>Запросите страницу с параметром:<br/>';
    echo 'message=' . $url_s;
}
/*
 * Строка (тип string) - это набор символов, где символ - это то же самое, что и байт.
 * Это значит, что PHP поддерживает ровно 256 различных символов, а также то, что в PHP нет встроенной поддержки Unicode.
 * Смотрите также подробности реализации строкового типа.
 * https://www.php.net/manual/ru/language.types.string.php
 */

$text1 = 'Community - all working together in harmony. Community, all working, together in harmony?';
echo $text1;
echo str_word_count($text1) . '<br><br>'; // 7
$arr = explode(' ', $text1);
var_dump($arr);

echo chr(37);
echo chr(38);
echo chr(39);
echo chr(40);
echo chr(48); //0
// chr(int $codepoint): string // codepoint - Целое число от 0 до 255.