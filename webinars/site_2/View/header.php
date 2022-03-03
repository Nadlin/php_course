<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <script src="<?=BASEURL.'js/user.js'?>"></script>
        
    </head>
    <body>
    <?php
    if (\Model\Session::getUserRole() == 'admin') {
    ?>
        <div>
            <a href="<?=BASEURL.'guestbook'?>">Guestbook</a>
            <a href="<?=BASEURL.'users'?>">Users</a>
        </div>
    <?php
    }
    ?>
        <div id="auth">
            <?= include 'View/login.php' ?>
        </div>