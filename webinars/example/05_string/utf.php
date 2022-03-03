<?php

$str1 = "ЁёЙй";
$str2 = 'Е' . mb_chr(0x308) . 'е' . mb_chr(0x308) . 
        'И' . mb_chr(0x306). 'и' . mb_chr(0x306);
$len1 = mb_strlen($str1);
$width1 = mb_strwidth($str1);
$len2 = mb_strlen($str2);
$width2 = mb_strwidth($str2);
echo mb_internal_encoding(), '<br>';
echo "$str1 - длина $len1 символов, ширина $width1 символов", '<br>';
echo "$str2 - длина $len2 символов, ширина $width2 символов";
