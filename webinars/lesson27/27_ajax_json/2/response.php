<?php
  header('Content-Type: application/json; charset="UTF-8"');
  $response['status'] = 'Ваш голос принят';
  $response['date'] = date('r');
  $json = json_encode($response);
  echo $json;
?>