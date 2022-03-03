<?php
  $chart = imagecreatetruecolor(100, 100);

  $data = array(25, 47, 33);//данные дл¤ отображени¤
// —оздание цветов
  $palette[] = imagecolorallocate($chart, 255, 255, 255);//фон
  $palette[] = imagecolorallocate($chart, 255, 0, 0);
  $palette[] = imagecolorallocate($chart, 0, 255, 0);
  $palette[] = imagecolorallocate($chart, 0, 0, 255);

  $width = imagesx($chart);
  $height = imagesy($chart);
  $r = floor(min($width, $height)/2);
  $sum = 0;
  for ($i=0; $i<count($data); $i++) $sum += $data[$i];
  $scale = 360 / $sum;
    
  imagefill($chart, 0,0, $palette[0]);//заливаем фоновым цветом
  $angle1 = 0;
  for ($i = 0; $i<count($data); $i++)
  {
    $angle2 = $angle1 + $scale * $data[$i];
    imagefilledarc($chart , $r , $r ,2*$r , 2*$r, $angle1, $angle2, $palette[$i+1], IMG_ARC_PIE);
    $angle1 = $angle2;
  }

  header('Content-Type: image/png');
  imagepng($chart);
  imagedestroy($chart);
?>