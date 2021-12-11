<?php

function getPage(): int
{
    return isset($_GET['page']) ? checkRequiredPage($_GET['page']) : 1;
}

function checkRequiredPage(string $value): int
{
    return is_numeric($value) && intval(abs($value)) == $value ? $value : 0;
}

function getPages(int $total, int $number_per_page): int
{
    return ceil($total / $number_per_page);
}

function getFirstCurrentMessage(int $currentPage, int $messages_per_page): int
{
    return ($currentPage - 1) * $messages_per_page;
}

