<?php
require 'functions.php';

try {
    $itemsPerPage = 10;
    $page = getPage();

    $data = createData(95);

    $itemsCount = getItemsCount($data);
    $pagesCount = getPagesCount($itemsCount, $itemsPerPage);
    if (!checkPageNumber($page, $pagesCount)) {
        throw new Exception('Запрошенная страница не существует');
    }
    $firstNumber = getFirstItemNumber($page, $itemsPerPage);
    $pageData = getPageData($data, $firstNumber, $itemsPerPage);

    include 'template/page.php';

} catch (Throwable $exc) {
    $error = $exc->getMessage();
    include 'template/error.php';
}
