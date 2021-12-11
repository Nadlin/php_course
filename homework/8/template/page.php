<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Работа с базой данных</title>
</head>
<body>
    <h3>Страница <?= $page ?></h3>
    <div class="content">
        <?php foreach ($current_messages as $message): ?>
            <div class="info">
                <p><b>User:</b> <?= $message['user'] ?></p>
                <p><b>Message:</b> <?= $message['message_text'] ?></p>
                <p><b>Time</b>: <?= $message['message_time'] ?></p><hr>
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
