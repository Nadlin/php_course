<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Работа с базой данных</title>
    <style>
        input, textarea {
            padding: 10px
        }
        input {
            margin-bottom: 20px;
        }
        textarea {
            width: 350px;
        }
    </style>
</head>
<body>
    <h3>Страница <?= $page ?></h3>
    <h4>Оставьте свой комментарий</h4>
    <form name="leave_comment" method="POST" action="formdata.php">
        <input type="text" name="user" placeholder="Ввведите ваше имя" value="" required><br>
        <textarea name="message_text" placeholder="Введите сообщение" rows="5" value="" required></textarea><br>  <!-- ? нужны ли values?-->
        <input type="submit" name="comment" value="Оставить комментарий">
    </form>
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
