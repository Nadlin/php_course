<?php

abstract class Message
{
    protected $user, $text, $msgtime;

    abstract public function show();
}

class Message1 extends Message
{
    private $email;

    public function __construct($user, $text, $msgtime, $email)
    {
        $this->user = $user;
        $this->text = $text;
        $this->msgtime = $msgtime;
        $this->email = $email;
    }
    public function show()
    {
        echo '<p>'.$this->user.' написал '.date('r', $this->msgtime).': '.$this->text.'</p>';
        echo '<p> e-mail: '.$this->email.'</p>';
    }
}

$m=new Message1('Вася', 'Привет', time(),'admin@localhost');
$m->show();
