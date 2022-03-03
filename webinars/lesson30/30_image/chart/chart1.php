<?php
  $chart = imagecreatetruecolor(100, 100);

  $data = array(25, 47, 33);//данные для отображения
// Создание цветов
  $palette[] = imagecolorallocate($chart, 255, 255, 255);//фон
  $palette[] = imagecolorallocate($chart, 255, 0, 0);
  $palette[] = imagecolorallocate($chart, 0, 255, 0);
  $palette[] = imagecolorallocate($chart, 0, 0, 255);

  $width = imagesx($chart);
  $height = imagesy($chart);
  $barWidth = $width/count($data);
  $barHeight = 0.95 * $height;
  $scale = $barHeight/max($data);//масштаб
  
  imagefill($chart, 0,0, $palette[0]);//заливаем фоновым цветом
  $x1 = 0.1*$barWidth;//зазор 0.1 ширины
  for ($i = 0; $i<count($data); $i++)
  {
    $x2 = $x1 + 0.8*$barWidth;// столбик 0.8 ширины
    $y2 = $height-1;
    $y1 = $y2 - $data[$i] * $scale;//масштабируем
    imagefilledrectangle($chart, $x1, $y1, $x2, $y2, $palette[$i+1]);
    $x1 = $x2 + 0.2 * $barWidth;
  }

  header('Content-Type: image/png');
  imagepng($chart);
  imagedestroy($chart);

?>