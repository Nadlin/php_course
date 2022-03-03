<?php


class View
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    private function renderData(): string
    {
        $html = '';
        foreach ($this->model->getPageData() as $key => $item) {
            $html .= "<div>{$item['user']}<br>{$item['topic']}<br>{$item['message']}<hr></div>";
        }
        return $html;
    }

    public function render()
    {
        $pageNumber = $this->model->getPageNumber();
        $pageData = $this->renderData();
        $pagination = Pagination::renderPagination($this->model->getPageNumber(), $this->model->getPagesCount());
        include 'template/page.php';
    }
}