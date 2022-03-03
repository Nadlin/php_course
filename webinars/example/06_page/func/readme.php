<?php
//Разбиваем нашу задачу постраничного вывода на подзадачи и намечаем нужные функции, их параметры и возвращаемое значение

//Получить номер страницы и проверить, что он является корректным номером существующей страницы.
// В противном случае выдать сообщение об ошибке.
function getPage(): int {}

//Извлечь данные для этой  страницы из файла (базы данных), для теста сгенерируем массив данных
function createData(int $count): array {}

    //Определяем общее количество данных (при чтении из файла или базы это заранее неизвестно).
    function getItemsCount(array $data): int {}
    //Проверяем данные на пустоту (возможно еще нет ни одного сообщения)
    //Определяем общее количество страниц, если данных нет 0 страниц, принимаем 1
    function getPagesCount(int $itemsCount, int $itemsPerPage) {}

    //Проверяем, что запрошенная страница не превышает их общего количества
    function checkPageNumber(int $page, int $pagesCount): bool {}

    //Определяем номер первого извлекаемого элемента
    function getFirstItemNumber(int $page, int $itemsPerPage): int {}

    //Извлекаем данные для запрошенной страницы в массив.
    function getPageData(array $data, int $firstNumber, int $itemsPerPage): array {}

    //Вывести извлеченные данные
    function renderData(array $data): string {}

    //Сформировать ссылки для перехода по страницам
    function renderReferences(int $page, int $pagesCount): string {}
