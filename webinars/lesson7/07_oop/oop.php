<?php
class Message
{
    public $user;
    public $text;
    public $time;
    public function show()
    {
        echo '<p>'.$this->user.' написал ' . date('r', $this->time).': '.$this->text.'</p>';
    }
}
$m=new Message;
$m->user='Вася';
$m->text='Привет';
$m->time=time();
$m->show();
