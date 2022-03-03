<?php

function mb_str_replace($haystack, $search, $replace, &$count = null, $encoding = '')
{
    if (empty($encoding)) $encoding = mb_internal_encoding();
    $len_sch = mb_strlen($search, $encoding);
    $count = 0;
    $result = '';
    while (($offset=mb_strpos($haystack, $search, 0, $encoding)) !== false){
        $result .= mb_substr($haystack,0, $offset, $encoding) . $replace;
        $haystack = mb_substr($haystack,$offset + $len_sch,null, $encoding);
        $count++;
    }
    return $result . $haystack;
}

$text = "Для замены фрагмента текста в юникоде встроенные функции замены str_replace, str_ireplace могут дать неверные результаты";
echo mb_str_replace($text, 'замены', '<b>замены</b>', $count);
echo '<br>количество замен - ', $count;
