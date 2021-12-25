<?php
//в форме у кнопки submit установлен атрибут name= "sendfile"
//проверяем, что эта кнопка была нажата и мы получили файл из этой формы
if (@$_POST['sendfile']) { //оператор @ подавления ошибки лучше не использовать
    echo 'Закачка файла:<br>';
    var_dump($_FILES);
    echo '<br>';
    if ($_FILES['loadfile']['error'] == 0) {
        echo 'Перемещение файла<br>';
        if (move_uploaded_file($_FILES['loadfile']['tmp_name'], $_FILES['loadfile']['name'])) {
            print "Файл успешно загружен <br>";
            exit();
        }
    }
}
echo 'Ошибка загрузки';