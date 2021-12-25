<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    //запись в БД
    header("Location: index.php");
    exit();
    //include('formdata.php');
} else {
    include('form.php');
}