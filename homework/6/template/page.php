<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Текст</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>
<body>
    <p>Страница <?= $page ?></p>
    <div class="content">
        <?php foreach ($par_per_page as $paragraph): ?>
            <p><?= $paragraph ?></p>
            <!--<p><//?= getWord($paragraph, 'что') ?></p>-->
            <div class="info">
                <p>Количество символов в абзаце: <?= countSymbols($paragraph) ?></p>
                <p>Количество слов в абзаце: <?= countWords($paragraph) ?></p>
                <p>Количество предложений в абзаце: <?= countSentenses($paragraph) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <?php if ($page == $i): ?>
                <span>Страница <?= $i ?></span>
            <?php else: ?>
                <a href="?page=<?= $i ?>">Страница <?= $i ?></a>
            <?php endif; ?>
        <? endfor; ?>
    </div>
</body>
</html>
