<?php


class Model
{
    private $data;
    private $pageNumber;
    private $itemsCount;
    private $itemsPerPage;
    private $pagesCount;
    private $pageData;

    public function __construct($pageNumber, $itemsPerPage)
    {
        $this->pageNumber = $pageNumber;
        $this->itemsPerPage=$itemsPerPage;
        $this->createData(95);
    }

    private function createData(int $count)
    {
        $this->data = [];
        for ($i = 0; $i < $count; $i++) {
            $user = 'User' . mt_rand(1, 10);
            $topic = 'Тема ' . mt_rand(1, 5);
            $message = 'Сообщение ' . ($i + 1);
            $this->data[$i] = ['user' => $user, 'topic' => $topic, 'message' => $message];
        }
    }

    private function setItemsCount()
    {
        $this->itemsCount = count($this->data);
    }

    private function setPagesCount()
    {
        $this->pagesCount = ceil($this->itemsCount/$this->itemsPerPage);
        if($this->pagesCount == 0) {
            $this->pagesCount = 1;
        }
    }

    private function checkPageNumber(): bool
    {
        return $this->pageNumber <= $this->pagesCount;
    }

    private function getFirstItemNumber(): int
    {
        return ($this->pageNumber - 1) * $this->itemsPerPage;
    }

    private function setPageData()
    {
        $this->pageData = array_slice($this->data, $this->getFirstItemNumber(), $this->itemsPerPage);
    }

    public function execute()
    {
        $this->setItemsCount();
        $this->setPagesCount();
        if (!$this->checkPageNumber()) {
            throw new Exception('Запрошенная страница не существует');
        };
        $this->setPageData();
    }

    /**
     * @return mixed
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @return mixed
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @return mixed
     */
    public function getPagesCount()
    {
        return $this->pagesCount;
    }

    /**
     * @return mixed
     */
    public function getPageData()
    {
        return $this->pageData;
    }
}