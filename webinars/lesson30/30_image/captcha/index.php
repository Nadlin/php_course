<?php
  session_start(); 
  if (isset($_POST["captcha"]))
  {
    if (strtoupper($_POST["captcha"])==$_SESSION["captcha"])
    {    
      echo "Вход выполнен";
      exit();    
    }      
    else echo "Вы ошиблись, попробуйте еще раз";
  }
?>
<form action="index.php" method="post">
  <img id="captcha_img" src="captcha.php?t=<?php echo time();?>" style="border: 1px solid black"/><br/>
  <p><a href="javascript:void(0)" onclick="var d = new Date(); document.getElementById('captcha_img').src = 'captcha.php?t='+d.getTime();">Не вижу символы</a></p>
  <p><input type="text" name="captcha"/>
  <input type="submit" value="OK" /></p>
</form>
