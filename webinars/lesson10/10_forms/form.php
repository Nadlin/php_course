<!DOCTYPE html>
<html>
<head>
<title>Работа с формой</title>
</head>
<body>
<h1>
    Ваши данные
</h1>
<form method="POST" action="index.php">
    Ваше имя<br>
    <input type="text" size="50" maxlength="50" name="regname" required pattern="^[A-Za-z]+$" value=""><br>
    <input maxlength="50" name="regname1" required size="50" type="text" value="<script>alert('Hi')</script>"><br>
    <br>Введите пароль<br>
    <input type="password" size="10" maxlength="10" name="psw" required value=""><br>
    <br>Ваш пол<br>
    <input type="radio" name="sex" value="m">  М<br>
    <input type="radio" name="sex" value="f">  Ж<br>
    <br>Ваш возраст<br>
    <select name="age" size=6>
        <option selected value="1"> до 18
        <option value="2"> 18-25
        <option value="3"> 25-35
        <option value="4"> 35-50
        <option value="5"> 50-75
        <option value="6"> более 75
    </select><br>
    <br>Ваши интересы<br>
    <input type="checkbox" name="ch[]" value="sport">  спорт<br>
    <input type="checkbox" name="ch[]" value="art">  искусство<br>
    <input type="checkbox" name="ch[]" value="computer">  компьютер<br>
    <input type="checkbox" name="ch[]" value="other">  другие<br>
    <br>Дополнительная информация<br>
    <textarea name="info" cols="40" rows="5"><script>alert('Hi')</script></textarea><br>
    <input type="hidden" name="myinfo" value="hidden info"><br>
    <input type="submit" name= "button1" value="Отправить">
    <input type="reset" value="Отменить">
</form>
</body>
</html>
