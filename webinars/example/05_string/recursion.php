<?php
function recursion($x)
{
  if (is_array($x))
  {
    foreach ($x as $value)
    recursion($value);
  }
  else
  {
    echo $x,'<br />';
  }
  return;
}
$x=array(array('Сервер'=>'Apache',
         'Язык программирования'=>'PHP','СУБД'=>'MySQL'),
         2, 
         array(7, 3, 2));
recursion($x);