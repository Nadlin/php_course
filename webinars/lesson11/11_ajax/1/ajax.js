function sendRequest() 
{
  let xhr = new XMLHttpRequest();
  let data = document.getElementById("ajaxdata").value; //получаем значение из поля ввода
  //составляем линк и отправляем запрос методом GET
  let url = "response.php?ajaxdata=" + encodeURIComponent(data);
  xhr.open("GET", url, true); //запрос асинхронный
  xhr.onreadystatechange = updateDocument; //имя функции обработки ответа сервера

  function updateDocument() 
  {
    if (xhr.readyState == 4) //проверяем статус завершения запроса - 4
    {
      if (xhr.status == 200) //проверяем код состояния 200 - OK
        {
        document.getElementById("result").innerHTML = xhr.responseText; //выводим ответ сервера в элемент div, id="result"
        } 
    }
  }
  xhr.send(); //для метода GET других данных не посылаем
} 