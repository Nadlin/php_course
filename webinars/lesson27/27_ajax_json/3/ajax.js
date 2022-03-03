function sendRequest()
{
    var xhr = new XMLHttpRequest();
    //данные формы
    var requestData = {
        username : document.getElementById("username").value,
        password : document.getElementById("password").value
    }
    //преобразуем их в JSON
    var requestJSON = JSON.stringify(requestData);
    
    xhr.open('POST', 'response.php', true);
    //устанавливаем заголовок формата данных json
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = updateDocument; //имя функции обработки ответа сервера

    function updateDocument() {
        if (xhr.readyState == 4) { //проверяем статус завершения запроса - 4
            if (xhr.status == 200) { //проверяем код состояния 200 - OK
                var answerJSON = xhr.responseText;//ответ в JSON
                //парсим JSON, получаем аналог объекта PHP
                var answer = JSON.parse(answerJSON);
                if (answer.error) {
                    document.getElementById("autherror").innerHTML = answer.error + ": " + answer.message;
                } else {
                    document.getElementById("auth").innerHTML = answer.message;
                }
            }
        }
    }
    xhr.send(requestJSON); //посылаем данные методом POST
} 