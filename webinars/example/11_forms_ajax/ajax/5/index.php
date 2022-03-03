<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>JavaScript AJAX</title>
<script>
function vote(outputElem) {
  var xhr = new XMLHttpRequest(); 
 
  xhr.open('GET', 'response.php', true); 
 
  xhr.onreadystatechange = function() {  
    if (xhr.readyState != 4) return; 
 
    var resp = JSON.parse(xhr.responseText);
    //или 
    //var resp = eval( '(' + xhr.responseText + ')' );
    outputElem.innerHTML = resp.status + ': ' + resp.date; 
  }
 
  outputElem.innerHTML = '...';
  xhr.send(null); 
}
</script>
</head>
<body>
<div>
  <button onClick="vote(this)">Нажмите, чтобы проголосовать</button>
</div>
</body>
</html>