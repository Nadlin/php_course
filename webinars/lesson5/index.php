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

echo chr(37); // генерирует односимвольную строку по заданному числу
echo chr(38);
echo chr(39);
echo chr(40);
echo chr(48); //0
// chr(int $codepoint): string // codepoint - Целое число от 0 до 255.
//ord ( string $character ) : int — конвертирует первый байт строки в число от 0 до 255
echo strtr("baab", "ab", "yyyyyyyyyyyyyyyyyyyyyyyyyy");
echo "\n" . ord('0') . "\n" ;

//ASCII (англ. American standard code for information interchange, [ˈæs.ki])

?>
<?php


// Строки можно передавать по отдельности как несколько аргументов или
// объединять вместе и передавать как один аргумент.
echo 'Эта ', 'строка ', 'сформирована ', 'из ', 'нескольких параметров.', "\n";
echo 'Эта ' . 'строка ' . 'сформирована ' . 'с ' . 'помощью конкатенации.' . "\n";

// Новая строка или пробел не добавляются; пример ниже выведет "приветмир" в одну строку
echo "привет";
echo "мир";

// То же, что и выше
echo "привет", "мир";

echo "Эта строка занимает
несколько строк. Новые строки также
будут выведены";

echo "Эта строка занимает\nнесколько строк. Новые строки также\nбудут выведены.";



// юникод символы
//mb_str_split
//возвращает массив символов строки (с PHP 7.4)
//mb_substr

/*
mb_substr(
    string $string,
    int $start,
    ?int $length = null,
    ?string $encoding = null
): string
Возвращает часть строки;
Корректно выполняет substr() для многобайтовых кодировок, учитывая количество символов. Позиция отсчитывается от начала string. Позиция первого символа - 0, второго - 1 и т.д.
*/

//mb_strlen ( string $str [, string $encoding ] ): int  - возвращает количество символов в строке $str, имеющих кодировку символов $encoding. Многобайтный символ вычисляется как 1.

/*
mb_strstr — Находит первое вхождение подстроки в строке
mb_strstr(
    string $haystack,
    string $needle,
    bool $before_needle = false,
    ?string $encoding = null
): string|false
mb_strstr() находит первое вхождение подстроки needle в строке haystack и возвращает часть haystack. Если needle не найдена, возвращается false.
before_needle - Определяет, какую часть строки haystack вернёт эта функция. Если установлено true, возвращается часть haystack от начала до первого вхождения needle (исключая needle).
Если установлено false, возвращается часть haystack от первого вхождения needle до конца (включая needle).
*/
?>
