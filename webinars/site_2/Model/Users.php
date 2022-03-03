<?php
namespace Model;

class Users {
    private $pageNumber;
    private $id;
    private $pagesCount = 1;
    private $data;
    
    private $select = 'select id, login, password, role ' .
        'from users order by login';
    private $insert = 'insert into users (login, password, role) ' .
        'values (?,?,?)';
    private $updateSelect = 'select login, role ' .
        'from users where id=?';
    private $update = 'update users set login=?, password=?, role=? ' .
        'where id=?';
    private $delete = 'delete from users where id=?';
    private $count = 'select count(*) from users';
    
    private $error = '';//ошибки валидации данных из формы
    
    public function __construct($pageNumber, $id)
    {
        $this->pageNumber = $pageNumber;
        $this->id = $id;
    }
    
    private function validate()
    {
        if (isset($_POST['login'])) {
            $login = trim($_POST['login']);
            $this->data['login'] = $login;
            if (mb_strlen($login) == 0) {
                $this->error .= 'Логин не может быть пустым<br>';
            }
        } else {
            $this->data['login'] = '';
            $this->error .= 'Необходимо заполнить логин<br>';
        }
        if (isset($_POST['password'])) {
            $password = trim($_POST['password']);
            $this->data['password'] = $password;
            if (mb_strlen($password) == 0) {
                $this->error .= 'Пароль не может быть пустым<br>';
            }
        } else {
            $this->data['password'] = '';
            $this->error .= 'Необходимо заполнить пароль<br>';
        }
        if (isset($_POST['role'])) {
            $role = trim($_POST['role']);
            $this->data['role'] = $role;
            if ($role != 'admin' && $role != 'user') {
                $this->error .= 'Роль может быть только admin или user<br>';
            }
        } else {
            $this->data['role'] = 'user';
            $this->error .= 'Необходимо заполнить роль<br>';
        }
        return $this->error == '';//true если не было ошибки
    }
    
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {//проверка данных и запись в базу
            if ($this->validate()) {
                \Core\Db::exec($this->insert, 
                    [$this->data['login'], 
                        password_hash($this->data['password'], PASSWORD_DEFAULT), 
                        $this->data['role']]);
            }
        } else {//пустые данные для формы
            $this->data = ['id' => 0, 'login' => '', 'password' => '', 'role' => 'user'];
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
                \Core\Db::exec($this->update, 
                    [$this->data['login'], 
                        password_hash($this->data['password'], PASSWORD_DEFAULT), 
                        $this->data['role'], $this->id]);
            }
        } else {//Чтение данных для редактирования
            $data = \Core\Db::select($this->updateSelect, [$this->id]);
            $this->data = $data[0];
            $this->data['password'] = '';
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
    
    public static function getUser($id)
    {
        $sql = 'select login, role from users where id=?';
        $user = \Core\Db::select($sql, [$id]);
        if (count($user) > 0) {
            return $user[0];
        } else {
            return [];
        }
    }
    
    public function login()
    {
        try {
            $login = $_POST['login']??'';
            $password = $_POST['password']??'';
            if (empty($login) || empty($password)) {
                throw new \Exception();
            }
            $sql = 'select id, password, role from users where login=?';
            $user = \Core\Db::select($sql, [$login]);
            if (count($user) == 0) {
                throw new \Exception();
            }
            if (!password_verify($password, $user[0]['password'])) {
                throw new \Exception();
            }
            \Model\Session::setUserId($user[0]['id']);
            \Model\Session::setUserLogin($login);
            \Model\Session::setUserRole($user[0]['role']);
        } catch (\Throwable $t) {
            $this->error = 'Ошибка входа';
        }
    }
    
    public function logout()
    {
        \Model\Session::exit();
    }
}
