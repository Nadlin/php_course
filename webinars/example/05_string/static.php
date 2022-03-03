<?php
function My_func()
  {
    static $a = 0;
    $a++;
    return $a;
  }
  for ($i = 0; $i < 5; $i++) echo My_func(), '<br>';

