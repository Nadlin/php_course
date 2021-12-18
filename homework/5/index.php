<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Массивы</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>
<body>
<?php


$text =
    "What is Symfony. Symfony is a set of PHP Components, a Web Application framework, a Philosophy, and a Community - all working together in harmony. " .
"Symfony Framework. The leading PHP framework to create websites and web applications. Built on top of the Symfony Components? " .
"Symfony Components?\n A set of decoupled and reusable components on which the best PHP applications are built, such as Drupal, phpBB, and eZ Publish. " .
"Symfony Community. <br>A passionate group of over 600,000 developers from more than 120 countries, all committed to helping PHP surpass the impossible. " .
"Symfony Philosophy! Embracing and promoting professionalism, best practices, standardization and of applications.";

echo nl2br($text) . '<hr>';

/*
1. Определить, сколько раз встречается в тексте слово Symfony и вывести текст, выделив его в тексте цветом.
2. Вывести в браузер статистику файла – количество абзацев, предложений, слов, символов.
3. Найти самое длинное слово. Если таких несколько, вывести в браузер их все.
4. Для каждого символа, имеющегося в тексте подсчитать, сколько раз он там встречается, символы расположить в возрастающем порядке.
*/

// 1. Определить, сколько раз встречается в тексте слово Symfony и вывести текст, выделив его в тексте цветом.

$count_Symfony = substr_count($text, 'Symfony');
echo "<br><br>Слово Sympony встречается $count_Symfony раз <br><br>";

$symfony_rpl = str_replace('Symfony', '<span class="red">Symfony</span>', $text);
echo $symfony_rpl . '<br><br><hr>';

// 2. Вывести в браузер статистику файла – количество абзацев, предложений, слов, символов.

$paragraph_count = substr_count($text, '<br>') + substr_count($text, "\n") + 1;
echo "Количество абзацев: $paragraph_count <br><br>";

$count_sentences = substr_count($text, '.') + substr_count($text, '?') + substr_count($text, '!');
echo "Количество предложений: $count_sentences <br><br>";

// Количество слов также подсчитано на строке 64 - count($arr)
$word_count = str_word_count($text);
echo "Количество слов: $word_count <br><br>";

echo 'Количество символов:' . strlen($text) . '<br><br><hr>';


// 3. Найти самое длинное слово. Если таких несколько, вывести в браузер их все.
// PHP_EOL - ?
$text1 = strtr($text, ['.' => '', ',' => '', '?' => '', '!' => '', '- ' => '']);  // учесть перевод строки, ? вариант сразу в массиве указать все символы, а потом на что меняем их
echo $text1 . '<br><br>';
$arr = explode(' ', $text1);
echo 'Количество слов: ' . count($arr) . '<br><br>';
$arr_bigwords = [$arr[0]];
$big_world_length = strlen($arr[0]);
var_dump($arr);
for ($i = 0; $i < count($arr); $i++) {
    if (strlen($arr[$i]) > $big_world_length) {
        $big_world_length = strlen($arr[$i]);
        $arr_bigwords = [$arr[$i]];
    } else if (strlen($arr[$i]) == $big_world_length) {
        $arr_bigwords[] = $arr[$i];
    }
}
//var_dump($arr_bigwords);
if (count($arr_bigwords) > 1) {
    echo 'Самые длинные слова:<br>';
} else {
    echo 'Самое длинное слово:<br>';
}
foreach($arr_bigwords as $value) {
   echo "$value <br>";
}
echo '<hr>';


// 4. Для каждого символа, имеющегося в тексте подсчитать, сколько раз он там встречается, символы расположить в возрастающем порядке.
// 4.1
foreach (count_chars($text, 1) as $i => $val) {
    echo "\"" , chr($i) , "\" встречается в строке $val раз(а).<br>";
}

// 4.2
for ($i = 0; $i < strlen($text); $i++) {
    $arr_symbols[] = $text[$i];
    //$arr_n[] = ord($text[$i]);
}
//var_dump($arr_symbols);
$arr_new = array_count_values($arr_symbols); //  возвращает массив, ключами которого являются значения массива, а значениями - частота повторения значений массива.
var_dump($arr_new);
ksort($arr_new, $flags = SORT_STRING);
var_dump($arr_new);
//! Замечание. Для символов < 32 (которые не имеют видимого символа, например, возврат каретки) можно было сделать вывод кода для них
?>


</body>
</html>