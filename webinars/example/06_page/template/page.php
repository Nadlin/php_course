<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Постраничный вывод</title>
    </head>
    <body>
        <h1>Страница <?=$page?></h1>
        <div>
            <?php
            foreach ($pageData as $key => $item) {
                echo "<div>{$item['user']}<br>{$item['topic']}<br>{$item['message']}<hr></div>";
            }
            ?>
        </div>
        <div>
            <?php
            for ($i = 1; $i <= $pagesCount; $i++) {
                if ($i == $page) {
                    echo "$i ";
                } else {
            ?>
                <a href="index.php?page=<?=$i?>"><?=$i?></a> 
            <?php
                }
            }
            ?>
        </div>
    </body>
</html>