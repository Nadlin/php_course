<?php
namespace View;

class Guestbook {
    private $model;
    
    public function __construct($model)
    {
        $this->model = $model;
    }
    
    private function form($url)
    {
        echo '<div>';
        if ($this->model->getError()) {
            echo $this->model->getError();
        }
        echo '<form method="POST" action="' . $url . '">';
        $data = $this->model->getData();
        echo '<p>Ваше имя <input type="text" name="name" value="' . $data['name'] . '"></p>';
        echo '<p>Сообщение <textarea name="message">' . $data['message'] . '</textarea></p>';
        echo '<input type="submit" value="Отправить">';
        echo '</form>';
        echo '</div>';
    }
    
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$this->model->getError()) {
            $url = "http://" . HOST . BASEURL . 
                     "guestbook/read/1/";
            header("Location: $url");
        } else {
            $title = "Добавить сообщение";
            include 'View/header.php';
            $this->form(BASEURL . 'guestbook/create/' . $this->model->getPageNumber());
            include 'View/footer.php';
        }
    }
    
    public function read()
    {
        $pageNumber = $this->model->getPageNumber();
        $title = "Сообщения (Страница " . 
            $pageNumber . ")";
        include 'View/header.php';
        if (!empty(\Model\Session::getUserRole())) {
            echo "<p><a href='" . BASEURL . 
                 "guestbook/create/$pageNumber'>Добавить сообщение</a></p>";
        }
        $pageData = $this->model->getData();
        foreach ($pageData as $message) {
            echo '<div>' . $message['name'] . '<br>';
            echo nl2br($message['message']) . '<br>';
            echo $message['message_time'] . '</div>';
            if (\Model\Session::getUserRole() == 'admin' ||
                    \Model\Session::getUserLogin() == $message['name']) {
                echo "<a href='" . BASEURL . 
                     "guestbook/delete/$pageNumber/" .
                     $message['id']. "'>Удалить</a> ";
                echo "<a href='" . BASEURL . 
                     "guestbook/update/$pageNumber/" .
                     $message['id']. "'>Редактировать</a>";
            }
            echo '<hr>';
        }
        echo '<div><p>';
        $pageCount = $this->model->getPagesCount();
        for ($i = 1; $i <= $pageCount; $i++) {
            if ($i == $pageNumber) {
                echo $i . ' ';
            } else {
                echo "<a href='" . BASEURL . 
                        "guestbook/read/$i'>$i</a> ";
            }
        }
        echo '</p></div>';
        include 'View/footer.php';
    }
    
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$this->model->getError()) {
            $url = "http://" . HOST . BASEURL . 
                     "guestbook/read/" . $this->model->getPageNumber();
            header("Location: $url");
        } else {
            $title = "Редактировать сообщение";
            include 'View/header.php';
            $this->form(BASEURL . 'guestbook/update/' . $this->model->getPageNumber() . "/" .
                     $this->model->getId());
            include 'View/footer.php';
        }
    }
    
    public function delete()
    {
        $pageNumber = $this->model->getPageNumber();
        $url = "http://" . HOST . BASEURL . 
                 "guestbook/read/$pageNumber/";
        header("Location: $url");
    }
    
}
