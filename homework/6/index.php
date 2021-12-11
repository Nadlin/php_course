<?php
/*
 * Разработать функции и реализовать с их помощью постраничный вывод произвольного русского текста по k абзацев на страницу.
1. Определить количество символов, количество слов и количество предложений для каждого абзаца.
2. Выделить цветом все вхождения какого-либо слова (подобрать из контекста) с любым регистром символов, не изменяя регистр оригинала. Если повторов слова мало, можно взять несколько слов.
3. Выделить первую букву каждого предложения жирным шрифтом.
4. Вывести полученную страницу в браузер.
 */
require 'functions.php';
try {
    $page = getPage();
    $text = getAllText();
    $paragraphs_per_page = 3;
    $arr_paragraphs = getParagraphs($text);
    $paragraph_count = countParagraphs($arr_paragraphs);
    $pages = getPages($paragraph_count, $paragraphs_per_page);
    if (!$page || $page > $pages) throw new Exception('Вы некорректно ввели страницу. Такой страницы не существует');
    $first_current_paragraph = getFirstCurrentParagraph($page, $paragraphs_per_page);
    $highlighted_word = 'что';
    $par_per_page = getCurrentParagraphs($arr_paragraphs, $first_current_paragraph, $paragraphs_per_page, $highlighted_word);
    include 'template/page.php';

} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}




