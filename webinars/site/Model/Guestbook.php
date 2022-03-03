<?php
namespace Model;

class Guestbook {
    private $pageNumber;
    private $id;
    private $pagesCount = 1;
    private $data;
    
    private $select = 'select id, name, message, message_time ' .
        'from guestbook order by id desc';
    private $insert = 'insert into guestbook (name, message) ' .
        'values (?,?)';
    private $updateSelect = 'select name, message ' .
        'from guestbook where id=?';
    private $update = 'update guestbook set name=?, message=? ' .
        'where id=?';
    private $delete = 'delete from guestbook where id=?';
    private $count = 'select count(*) from guestbook';
    
    private $error = '';//ошибки валидации данных из формы
    
    public function __construct($pageNumber, $id)
    {
        $this->pageNumber = $pageNumber;
        $this->id = $id;
    }
    
    private function validate()
    {
        if (isset($_POST['name'])) {
            $name = trim($_POST['name']);
            $this->data['name'] = $name;
            if (mb_strlen($name) == 0) {
                $this->error .= 'Имя не может быть пустым<br>';
            }
        } else {
            $this->data['name'] = '';
            $this->error .= 'Необходимо заполнить имя<br>';
        }
        if (isset($_POST['message'])) {
            $message = trim($_POST['message']);
            $this->data['message'] = $message;
            if (mb_strlen($message) == 0) {
                $this->error .= 'Сообщение не может быть пустым<br>';
            }
        } else {
            $this->data['message'] = '';
            $this->error .= 'Необходимо заполнить сообщение<br>';
        }
        return $this->error == '';//true если не было ошибки
    }
    
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {//проверка данных и запись в базу
            if ($this->validate()) {
                \Core\Db::exec($this->insert, [$this->data['name'], $this->data['message']]);
            }
        } else {//пустые данные для формы
            $this->data = ['id' => 0, 'name' => '', 'message' => ''];
        }
    }
    
    public function read()
    {
        $this->pagesCount = ceil(\Core\Db::count($this->count) 
                / DATA_PER_PAGE);
        if ($this->pagesCount < 1) $this->pagesCount = 1;
        $first = ($this->pageNumber - 1) * DATA_PER_PAGE;
        $sql = $this->select . ' limit ' . $first . ',' . DATA_PER_PAGE;
        $this->data = \Core\Db::select($sql);
    }
    
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {//проверка данных и запись в базу
            if ($this->validate()) {
                \Core\Db::exec($this->update, [$this->data['name'], $this->data['message'], $this->id]);
            }
        } else {//Чтение данных для редактирования
            $data = \Core\Db::select($this->updateSelect, [$this->id]);
            $this->data = $data[0];
        }
    }
    
    public function delete()
    {
        \Core\Db::exec($this->delete, [$this->id]);
    }
    
    public function getPageNumber() {
        return $this->pageNumber;
    }

    public function getId() {
        return $this->id;
    }

    public function getPagesCount() {
        return $this->pagesCount;
    }

    public function getData() {
        return $this->data;
    }

    public function getError() {
        return $this->error;
    }
}
