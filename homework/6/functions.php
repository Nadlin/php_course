<?php

function getPage(): int
{
    return isset($_GET['page']) ? checkRequiredPage($_GET['page']) : 1;
}

function checkRequiredPage(string $value): int
{
    return is_numeric($value) && intval(abs($value)) == $value ? $value : 0;
}

function getAllText(): string
{
    return file_get_contents('text.txt');
}
/*
file_get_contents() возвращает содержимое файла в строке, начиная с указанного смещения offset и до length байт. В случае неудачи, file_get_contents() вернёт false.
Использование функции file_get_contents() наиболее предпочтительно в случае необходимости получить содержимое файла целиком
 */
function getParagraphs(string $text): array
{
    return explode('\n', $text);
}

function countParagraphs(array $paragraphs): int
{
    return count($paragraphs);
}

function getPages(int $total, int $number_per_page): int
{
    return ceil($total / $number_per_page);
}

function getFirstCurrentParagraph(int $currentPage, int $paragraphs_per_page): int
{
    return ($currentPage - 1) * $paragraphs_per_page;
}

function getCurrentParagraphs(array $arr, int $offset, int $paragraphs_per_page, string $word): array
{
    $cur_arr = array_slice($arr, $offset, $paragraphs_per_page);
    for ($i=0; $i < $paragraphs_per_page; $i++) {
        $cur_arr[$i] = highlightWords($cur_arr[$i], $word);
        $cur_arr[$i] = highlightFirstWord($cur_arr[$i]);
    }
    return $cur_arr;
}

function highlightWords(string $text, string $word)
{
    $pattern = "/$word/i";
    $new_text = preg_replace($pattern, "<span class='red'>$word</span>", $text);
    return $new_text;
}

function highlightFirstWord(string $text)
{
    $delimeter = '. ';
    $arr_sentenses = explode($delimeter, $text);
    $paragraph = '';
    for ($i = 1; $i < count($arr_sentenses); $i++) {
        if ($arr_sentenses[$i] != '') {
            $firstLetter = mb_substr($arr_sentenses[$i], 0, 1);
            $other_letters = mb_substr($arr_sentenses[$i], 1);
            $paragraph .= "<b>$firstLetter</b>" . $other_letters . $delimeter;
        } else {
            unset($arr_sentenses[$i]);
        }
    }
    return $paragraph;
}

function countSymbols(string $paragraph): int
{
    return mb_strlen($paragraph);
}

function countWords(string $paragraph): int
{
    $arr_words = explode(' ', $paragraph);
    return count($arr_words);
}

function countSentenses(string $paragraph): int
{
    return mb_substr_count($paragraph, '. ') + mb_substr_count($paragraph, '! ') + mb_substr_count($paragraph, '? ');
}



