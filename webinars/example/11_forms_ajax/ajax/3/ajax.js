function sendRequest() 
{
  let xhr = new XMLHttpRequest();
  //URL кодируем данные формы
  let data1 = document.getElementById("username").value;
  let data2 = document.getElementById("password").value;
  let data = "username=" + encodeURIComponent(data1)
    + "&password=" + encodeURIComponent(data2);
  xhr.open('POST', 'response.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = updateDocument; //имя функции обработки ответа сервера

  function updateDocument() 
  {
    if (xhr.readyState == 4) //проверяем статус завершения запроса - 4
    {
      if (xhr.status == 200) //проверяем код состояния 200 - OK
        {
        document.getElementById("auth").innerHTML = xhr.responseText; //заменяем форму на ответ сервера
        } 
    }
  }
  xhr.send(data); //посылаем данные методом POST
} 