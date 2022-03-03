<?php


class Controller
{
    private $pageNumber = 1;
    private $model;
    private $view;

    private function setPageNumber()
    {
        $this->pageNumber = intval($_GET['page'] ?? 1);
    }

    public function run()
    {
        try {
            ob_start();
            $this->setPageNumber();
            if ($this->pageNumber < 1) {
                throw new Exception('Запрошенная страница не существует');
            }
            $this->model = new Model($this->pageNumber, ITEMS_PER_PAGE);
            $this->model->execute();
            //var_dump($this->model->getPageData());
            $this->view = new View($this->model);
            $this->view->render();
            ob_end_flush();
        } catch (Throwable $exc) {
            ob_end_clean();
            $error = $exc->getMessage();
            include 'template/error.php';
        }

    }
}