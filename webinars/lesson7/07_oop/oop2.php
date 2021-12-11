<?php
class Message
{
    private $user;
    private $text;
    private $time;
    public function __construct($user, $text, $time)
    {
        echo '<p>Запущен конструктор!</p>';
        $this->user=$user;
        $this->text=$text;
        $this->time=$time;
    }
    public function __destruct()
    {
        echo '<p>Запущен деструктор!</p>';
    }
    public function show()
    {
        echo '<p>'.$this->user.' написал '.date('r', $this->time).': '.$this->text.'</p>';
    }
}
$m=new Message('Вася', 'Привет', time());
$m->user = 'Ваня';
$m->show();
unset($m);