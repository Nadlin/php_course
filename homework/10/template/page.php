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
        .message {
            display: flex;
        }
        .photo {
            flex-basis: 150px;
            flex-shrink: 0;
            text-align: center;
        }
        .info {
            flex-grow: 1;
        }
        .action a {
            margin-right: 40px;
        }
        body {
            max-width: 1000px;
            margin: 0 auto;
        }
        img {
            max-width: 90%;
        }
    </style>
</head>
<body>
    <h1>Страница <?= $page ?></h1>
    <h2>Оставьте свой комментарий</h2>
    <form name="leave_comment_file" enctype="multipart/form-data" method="POST" action="formdata.php">
        <input type="text" name="user" placeholder="Ввведите ваше имя" value="" required><br>
        <textarea name="message_text" placeholder="Введите сообщение" rows="5" value="" required></textarea><br>
        <input type="file" name="file"><br>
        <p>* формат файла для аватар д.б. c расширением jpeg </p>
        <input type="hidden" name="MAX_FILE_SIZE" value="65535">  <!-- oк 66 KB??-->
        <input type="submit" name="comment" value="Оставить комментарий и загрузить файл">
    </form>
    <h2>Комментарии</h2>
    <div class="content">
        <?php foreach ($current_messages as $message): ?>
            <div class="message">
                <div class="photo">
                    <?php if ($message['avatar']): ?>
                        <img src="<?= $message['avatar'] ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="info">
                    <p><b>User: </b><?= $message['user'] ?></p>
                    <p><b>Message:</b> <?= $message['message_text'] ?></p>
                    <p><b>Time</b>: <?= $message['message_time'] ?></p>
                    <p class="action"><a href="edit.php?id=<?= $message['id'] ?>">Редактировать</a><a href="delete.php?id=<?= $message['id'] ?>">Удалить</a></p>
                </div>
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
