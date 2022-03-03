<?php
namespace View;

class Users {
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
        echo '<p>Логин <input type="text" name="login" value="' . $data['login'] . '"></p>';
        echo '<p>Пароль <input type="password" name="password" value="' . $data['password'] . '"></p>';
        echo '<p>Роль<br><input type="radio" name="role" value="admin" ' . 
                ($data['role'] == 'admin'?'checked':'') . '>admin<br>';
        echo '<input type="radio" name="role" value="user" ' .
                ($data['role'] == 'user'?'checked':'') . '>user</p>';
        echo '<input type="submit" value="Отправить">';
        echo '</form>';
        echo '</div>';
    }
    
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$this->model->getError()) {
            $url = "http://" . HOST . BASEURL . 
                     "users/read/1/";
            header("Location: $url");
        } else {
            $title = "Добавить пользователя";
            include 'View/header.php';
            $this->form(BASEURL . 'users/create/' . $this->model->getPageNumber());
            include 'View/footer.php';
        }
    }
    
    public function read()
    {
        $pageNumber = $this->model->getPageNumber();
        $title = "Пользователи (Страница " . 
            $pageNumber . ")";
        include 'View/header.php';
        echo "<p><a href='" . BASEURL . 
                 "users/create/$pageNumber'>Добавить пользователя</a></p>";
        $pageData = $this->model->getData();
        foreach ($pageData as $message) {
            echo '<div>Логин: ' . $message['login'] . '<br>';
            echo 'Роль: ' . $message['role'] . '<br>';
            echo "<a href='" . BASEURL . 
                 "users/delete/$pageNumber/" .
                 $message['id']. "'>Удалить</a> ";
            echo "<a href='" . BASEURL . 
                 "users/update/$pageNumber/" .
                 $message['id']. "'>Редактировать</a><hr>";
        }
        echo '<div><p>';
        $pageCount = $this->model->getPagesCount();
        for ($i = 1; $i <= $pageCount; $i++) {
            if ($i == $pageNumber) {
                echo $i . ' ';
            } else {
                echo "<a href='" . BASEURL . 
                        "users/read/$i'>$i</a> ";
            }
        }
        echo '</p></div>';
        include 'View/footer.php';
    }
    
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$this->model->getError()) {
            $url = "http://" . HOST . BASEURL . 
                     "users/read/" . $this->model->getPageNumber();
            header("Location: $url");
        } else {
            $title = "Редактировать сообщение";
            include 'View/header.php';
            $this->form(BASEURL . 'users/update/' . $this->model->getPageNumber() . "/" .
                     $this->model->getId());
            include 'View/footer.php';
        }
    }
    
    public function delete()
    {
        $pageNumber = $this->model->getPageNumber();
        $url = "http://" . HOST . BASEURL . 
                 "users/read/$pageNumber/";
        header("Location: $url");
    }
    
}
