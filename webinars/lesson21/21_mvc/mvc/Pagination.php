<?php


class Pagination
{
    private static $url = 'index.php';
    private static $parameterName = 'page';

    public static function renderPagination(int $page, int $pagesCount)
    {
        $html = '';
        for ($i = 1; $i <= $pagesCount; $i++) {
            if ($i == $page) {
                $html .= "$i ";
            } else {
                $html .= '<a href="' . self::$url . '?' . self::$parameterName . "=$i\">$i</a> ";
            }
        }
        return $html;
    }

    /**
     * @param string $url
     */
    public static function setUrl(string $url): void
    {
        self::$url = $url;
    }

    /**
     * @param string $parameterName
     */
    public static function setParameterName(string $parameterName): void
    {
        self::$parameterName = $parameterName;
    }
}