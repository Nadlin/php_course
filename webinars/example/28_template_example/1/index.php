<?php
//Шаблонизация с PHP-кодом в шаблоне

//***Сверхупрощенный контроллер***
  $id=empty($_GET['page'])?1:(int)$_GET['page'];//id запрошенной страницы
  //Поскольку в примере только один тип страниц, демонстрирующий шаблоны
  //то подгружать разные model и view не приходится
//********************************

//***Простейшая модель***
  //Массив $content имитирует таблицу базы данных pages, содержащую данные страницы с полями:
  //id, menu (текст пункта меню), title, text (текст страницы)
  $content=array(
    array('id'=>1, 'menu'=>'Страница 1', 'title'=>'Пример страницы 1', 'text'=>'Это главная страница'),
    array('id'=>2, 'menu'=>'Страница 2', 'title'=>'Пример страницы 2', 'text'=>'Это вторая станица по шаблону главной'),
    array('id'=>3, 'menu'=>'Страница 3', 'title'=>'Пример страницы 3', 'text'=>'Можно легко создавать и другие страницы по такому же шаблону '));

  //Извлекаем данные для меню - имитация запроса select id, menu from pages; 
  //если меню посложнее с вложенными меню, то и цикл нужно будет немного усложнить
  foreach ($content as $menuitem)
  {
    $menu[$menuitem['id']]=$menuitem['menu'];
  }
  //Теперь в $menu хранится массив в виде - id=>текст пункта меню:
  //'id'=>1, 'menu'=>'Страница 1'
  //'id'=>2, 'menu'=>'Страница 2'
  //'id'=>3, 'menu'=>'Страница 3'
  
  //Извлекаем данные страницы - имитация запроса (например для 1-ой страницы) select title, text from pages where id=1
  $index=array_search($id, array_column($content, 'id'));
  $data=array('title'=>$content[$index]['title'], 'text'=>$content[$index]['text']);
  //В $data например если $id==1 теперь будет массив данных страницы
  //'title'=>'Пример страницы 1', 'text'=>'Основной текст страницы 1'
//********************************

//***Для VIEW подключаем шаблон, выводящий страницу***
  require 'page.php';