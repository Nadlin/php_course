<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Постраничный вывод</title>
    </head>
    <body>
        <h1>Страница <?=$page?></h1>
        <div>
            <?=renderData($pageData)?>
        </div>
        <div>
            <?=renderReferences($page, $pagesCount, 'index.php', 'page')?>
        </div>
    </body>
</html>