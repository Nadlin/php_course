<?php
//номер страницы
function getPage(): int
{
    $page = intval($_GET['page'] ?? 1);
    if ($page < 1) {
        throw new Exception('Запрошенная страница не существует');
    }
    return $page;
}

//формируем тестовый массив данных
function createData(int $count): array
{
    $data = [];
    for ($i = 0; $i < 95; $i++) {
        $user = 'User' . mt_rand(1, 10);
        $topic = 'Тема ' . mt_rand(1, 5);
        $message = 'Сообщение ' . ($i + 1);
        $data[$i] = ['user' => $user, 'topic' => $topic, 'message' => $message];
    }
    return $data;
}

//количество данных
function getItemsCount(array $data): int
{
    return count($data);
}

//количество страниц
function getPagesCount(int $itemsCount, int $itemsPerPage)
{
    $pagesCount = ceil($itemsCount/$itemsPerPage);
    if($pagesCount == 0) { //если данных нет
        $pagesCount = 1; //то одна страница, хоть и пустая, все равно должна быть
    }
    return $pagesCount;
}

//проверка страницы
function checkPageNumber(int $page, int $pagesCount): bool
{
    return $page <= $pagesCount;
}

//номер первого извлекаемого элемента
function getFirstItemNumber(int $page, int $itemsPerPage): int
{
    return ($page - 1) * $itemsPerPage;
}
//извлекаем данные
function getPageData(array $data, int $firstNumber, int $itemsPerPage): array
{
    return array_slice($data, $firstNumber, $itemsPerPage);
}

//Вывести извлеченные данные
function renderData(array $pageData): string
{
    $html = '';
    foreach ($pageData as $key => $item) {
        $html .= "<div>{$item['user']}<br>{$item['topic']}<br>{$item['message']}<hr></div>";
    }
    return $html;
}

//Сформировать ссылки для перехода по страницам
function renderReferences(int $page, int $pagesCount, string $url, string $parameter): string
{
    $html = '';
    for ($i = 1; $i <= $pagesCount; $i++) {
        if ($i == $page) {
            $html .= "$i ";
        } else {
            $html .= "<a href=\"$url?$parameter=$i\">$i</a> ";
        }
    }
    return $html;
}
