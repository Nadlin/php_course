<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Добавление сообщения c файлом / редактирование / удаление сообщения</title>
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
        img {
            width: 100px;
            margin-right: 20px;
            float: left;
        }
        .info::after {
            clear: both;
            content: '';
            display: block;
        }
    </style>
</head>
<body>
    <h3>Страница <?= $page ?></h3>
    <h4>Оставьте свой комментарий</h4>
    <form name="leave_comment_file" enctype="multipart/form-data" method="POST" action="formdata.php">
        <input type="text" name="user" placeholder="Ввведите ваше имя" value="" required><br>
        <textarea name="message_text" placeholder="Введите сообщение" rows="5" value="" required></textarea><br>
        <input type="file" name="file" required><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="65535">  <!-- oк 66 KB??-->
        <input type="submit" name="comment" value="Оставить комментарий и загрузить файл">
    </form>
    <div class="content">
        <?php foreach ($current_messages as $message): ?>
            <div class="info">
                <div>
                    <?php if ($message['avatar']): ?>
                        <img src="<?= $message['avatar'] ?>" alt="">
                    <?php endif; ?>
                    <p><b>User: </b><?= $message['user'] ?></p>
                </div>
                <p><b>Message:</b> <?= $message['message_text'] ?></p>
                <p><b>Time</b>: <?= $message['message_time'] ?></p>
                <a href="edit.php?id=<?= $message['id'] ?>">Редактировать</a><a href="delete.php?id=<?= $message['id'] ?>">Удалить</a>
            </div><hr>
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
