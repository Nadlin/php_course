<?php
  $filename = 'R1.jpg';
  $percent = 0.25;
  $image = imagecreatefromjpeg($filename);

// получение новых размеров
  $width = imagesx ($image);
  $height = imagesy ($image);
  $new_width = round($width * $percent);
  $new_height = round($height * $percent);

// ресэмплинг
  $image_p = imagecreatetruecolor($new_width, $new_height);
  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
  imagedestroy ($image);//Закрываем оригинал изображения

// вывод
  header('Content-Type: image/jpeg');// тип содержимого
  imagejpeg($image_p, null, 100);
  imagedestroy($image);
