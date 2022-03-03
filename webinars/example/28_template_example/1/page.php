<!DOCTYPE html>
  <head>
    <title><?php echo $data['title'];?></title>
  </head>
  <body>
    <div id="header">
      <h1>Пример использования шаблона</h1>
    </div>
    <div id="menu">
      <ul>
      <?php foreach ($menu as $id=>$menuitem) {?>
        <li><a href="index.php?<?php echo 'page='.$id;?>"><?php echo $menuitem?></a></li>
      <?php }?>
      </ul>
    </div>
    <div id="text">
      <?php echo $data['text'];?>
    </div>
  </body>
</html>