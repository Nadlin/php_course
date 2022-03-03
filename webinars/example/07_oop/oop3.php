<?php
class Message
{
    private $user;
    private $text;
    private $time;

    public function __construct($user, $text, $time)
    {
        echo '<p>Запущен конструктор!</p>';
        $this->user = $user;
        $this->text = $text;
        $this->time = $time;
    }

    public function __destruct()
    {
        echo '<p>Запущен деструктор!</p>';
    }

    public function show()
    {
        echo '<p>' . $this->user . ' написал ' . date('r', $this->time) . ': ' . $this->text . '</p>';
    }
}

class Message1 extends Message
{
    private $email;
    public function __construct($user, $text, $time, $email)
    {    //Конструктор родителя при перегрузке автоматически не запускается, надо вызвать явно
        parent::__construct($user, $text, $time);
        echo '<p>Запущен конструктор класса Message1!</p>';
        $this->email=$email;
    }
    public function show()
    {
        parent::show();
        echo '<p> e-mail: '.$this->email.'</p>';
    }
    public function setemail($email)
    {
        $this->email=$email;
    }
}
$m=new Message1('Вася', 'Привет', time(), 'admin@localhost');
//$m->setemail('admin@localhost');
$m->show();
