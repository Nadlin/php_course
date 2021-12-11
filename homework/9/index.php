<?php
/*
Для произвольного текстового файла с использованием низкоуровневых файловых функций:
выбрать все предложения, содержащие слова из набора 3-5 ключевых слов с любым регистром символов (задать самостоятельно в соответствии с содержанием текста)
результат выборки сохранить в новый текстовый файл, каждое предложение с новой строки
 */

function checkWords(string $text, array $words): bool
{
    for ($i = 0; $i < count($words); $i++) {
        if (mb_strstr($text, $words[$i])) {
            return true;
        }
    }
    return false;
}

$words = ['что', 'неоднократно'];

if ($file_r = fopen('text.txt', 'r')) {
    $file_w = fopen('text_new.txt', 'x+');
    while (!feof($file_r)) {
        $text = fgets($file_r);
        $delimeter = '. ';
        $arr_sentences = explode($delimeter, $text);
        foreach ($arr_sentences as $sentence) {
            if (checkWords(trim($sentence, "\n"), $words)) {
                fputs($file_w, $sentence . ".\n");
            }
        }
    }
    fclose($file_r);
    fclose($file_w);
}


// вариант 2 (с функциями высокого уровня)

/*$textFromFile = file_get_contents('text.txt');
$delimeter = '. ';
$arr_sentences = explode($delimeter, trim($textFromFile, "\n"));
foreach ($arr_sentences as $sentence) {
    if (checkWords($sentence, $words)) {
        file_put_contents('text-new.txt', $sentence . ".\n", FILE_APPEND);
    }
}*/








