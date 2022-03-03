<?php
namespace Model;

class User {
    private $user;
    private $requestParameters;

    public function __construct($requestParameters)
    {
        $this->requestParameters = $requestParameters;
    }

    public function register() {
        $email = $this->requestParameters['email'];
        $password = password_hash($this->requestParameters['password'], PASSWORD_ARGON2ID);
        if (!empty($email) && !empty($password) && !$this->checkUser($email)) {
            $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
            $last_id = \Db::create($sql);
            \Model\Session::setUserId($last_id);
            \Model\Session::setUserEmail($email);
            header("Location: /current");
        } else {
            $error = "<div id='message' class='-error'>User with such email $email already exists. Please try to log in or register with another email.</div>";
            include 'template/main.phtml';
        }
    }

    public function checkUser($login) {
        $sql = "SELECT * FROM user WHERE email='$login'";
        $isUser = \Db::select($sql);
        return $isUser;
    }

    function login () {
        $email = $this->requestParameters['email'];
        $user = $this->checkUser($email);
        if ($user) {
            $password = $this->requestParameters['password'];
            $passwordDB = $user[0]['password'];
            $isDBUser = password_verify($password, $passwordDB);
        }
        if ($user && $isDBUser) {
            \Model\Session::setUserId($user[0]['user_id']);
            \Model\Session::setUserEmail($email);
            header("Location: /current");
        } else {
            $error = "<div id='message' class='-error'>You've entered incorrect Password or Email</div>";
            include 'template/main.phtml';
        }
    }
}