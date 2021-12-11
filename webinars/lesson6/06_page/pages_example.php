<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>  
<?php
//нам нужно осуществить постраничный вывод информации, которая хранится в массиве
//это могут быть сообщения на форуме, список новостей, информация о товарах и т.п.
//для примера просто сгенерирем тестовый массив данных $x
//реально это будет конечно информация, прочитанная из базы данных или из файла

$n = 100;
$x=array();//пустой массив, если зададим $n=0, то в цикле ничего не добавится, но будет пустой массив если нет данных 
for ($i=0; $i<$n; $i++) $x[] = 'Сообщение '.$i;

//номер страницы обычно передается методом GET в виде параметров запроса после знака ?
//в адресной строке браузера, например для 3 страницы http://localhost/pages_example.php?page=3
//или сделайте соответствующую коррекцию здесь и далее в имени файла
//при таком запросе автоматически будет выполнен разбор и URL-декодирование строки запроса,
//параметр запроса (page=3) будет помещен в глобальный массив $_GET
//создав в нем элемент $_GET['page']=3, а мы своем скрипте уже будем использовать $_GET['page']
//название параметра (page) устанавливаем сами
//если не знаем английский, то можно и http://localhost/pages_example.php?stranica=3
//тогда будет создан соответственно элемент массива $_GET['stranica']=3
//адрес можно как набрать в адресной строке, так и кликом по соответствующей ссылке
//которые мы в дальнейшем сгенерируем
//
//возможны и другие варианты адреса:
//
//вариант без страницы http://localhost/pages_example.php
//нормально - это просто ссылка, например, на наш форум, тогда покажем первую страницу
//
//ошибочные варианты случайные (или злонамеренные) при наборе адреса
//http://localhost/pages_example.php?page=1000    - несуществующая страница
//http://localhost/pages_example.php?page=2.5    - это как понимать?
//http://localhost/pages_example.php?page=2q    - случайно зацепили соседнюю клавишу
//http://localhost/pages_example.php?page=    - не нажали номер страницы
//http://localhost/pages_example.php?page=try_hack    - а проверим-ка скрипт на "вшивость"
//все возможные ошибки ОБЯЗАТЕЛЬНО нужно обработать

$data_per_page=10;//задаем количество данных, выводимых на одну страницу
$data_count=count($x);//определяем количество данных (при хранении в базе данных здесь будет запрос к базе)

//Если данных нет, дальше нечего делать выводим сообщение об их отсутствии, в примере для простоты через die
if (!$data_count) die("Извините, данные для отображения на данный момент отсутствуют");
$pages_count=ceil($data_count/$data_per_page);//количество страниц с округлением до целого в верхнюю сторону

//Теперь анализируем параметр page запроса, проверяем отсутствие параметра в запросе
$current_page=isset($_GET['page'])?$_GET['page']:1;//в случае запроса с параметром page он запишется в $current_page
                                                   //иначе если запрошен адрес без параметров - pages_example.php, то будет $current_page=1
$current_page=intval($current_page);//Преобразуем полученные данные  в $current_page к целому чису, т.е. 2.5 к 2, а строки (типа try_hack) к 0
//теперь проверим существование страницы, если ее нет, даем сообщение о несуществующей странице
if ($current_page<1||$current_page>$pages_count) die("Запрошенная Вами страница не найдена");
  
//если сюда добрались, в $current_page лежит актуальный номер страницы, можно обрабатывать
//получаем данные страницы, в примере извлекаем из массива, реально это будет обычно из базы данных
//определяем номер первого элемента для вывода из массива $x
$first_element=($current_page-1)*$data_per_page;
//извлекаем только нужные элементы из массива $x, начиная с вычисленного $first_element в количестве $data_per_page
$page_data=array_slice($x, $first_element, $data_per_page);

//теперь выводим данные на страницу
foreach ($page_data as $element)
{
  echo '<div>';
  echo '<p>'.$element.'</p>';//в реальном форуме например, здесь выведем  ник, дату, текст сообщения
  echo '</div>';
}

//а теперь формируем ссылки для перехода по страницам
$str=3;//количество страниц (+/- к текущей) для ссылок, например для 5 страницы получим от 5-3=2 до 5+3=8
//Вычисляем начальную и конечную страницы для ссылок
$start=$current_page-$str;
if ($start<1) $start=1;//если номер страницы оказался меньше 1 присваиваем 1
$end=$current_page+$str;
if ($end>$pages_count) $end=$pages_count;//если номер страницы оказался больше $pages_count, присваиваем $pages_count
//формируем в цикле ссылки страниц от $start до $end кроме текущей $current_page, для которой выводится просто ее номер
for ($i=$start; $i<=$end; $i++)
{
  if ($i==$current_page)
    echo $i.'&nbsp;&nbsp; ';
  else
    echo '<a href="pages_example.php?page='.$i.'">'.$i.'</a>&nbsp;&nbsp; ';
}
echo '<div><p>Ну вот и все, с десяток строк кода, комментов писать пришлось на порядок больше :)</p><p>Надеюсь, помогут хорошо разобраться.</p><p>УСПЕХОВ!!!</p></div>';
?>

</body>
</html>