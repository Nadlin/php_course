<?php
require 'functions.php';
try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $mysqli = new mysqli("localhost", "root", "", "guestbook");
        deleteMessage($mysqli, $id);
        header("Location: index.php");
        exit();
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}

