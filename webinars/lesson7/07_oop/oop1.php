<?php
class Message
{
    public $user;
    public $text;
    public $time;

    public function __construct($user, $text, $time)
    {
        echo '<p>Запущен конструктор!</p>';
        $this->user=$user;
        $this->text=$text;
        $this->time=$time;
    }
    /*
//  Для PHP 8 код выше можно заменить на:
    public function __construct(
        public $user,
        public $text,
        public $time)
    {
        //echo '<p>Запущен конструктор!</p>';
    }
*/
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
$m->show();
//unset($m);
