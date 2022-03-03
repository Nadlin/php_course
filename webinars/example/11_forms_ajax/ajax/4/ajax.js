function sendRequest()
{
    var xhr = new XMLHttpRequest();
    //данные формы в XML
    var requestXML = document.implementation.createDocument("", "request", null);
    var auth = requestXML.documentElement;
    var username = requestXML.createElement("username");
    auth.appendChild(username);
    username.appendChild(requestXML.createTextNode(document.getElementById("username").value));
    var password = requestXML.createElement("password");
    auth.appendChild(password);
    password.appendChild(requestXML.createTextNode(document.getElementById("password").value));
    xhr.open('POST', 'response.php', true);
    //header Content-type можно не отправлять, для XML он автоматически формируется браузером
    xhr.onreadystatechange = updateDocument; //имя функции обработки ответа сервера

    function updateDocument() {
        if (xhr.readyState == 4) { //проверяем статус завершения запроса - 4
            if (xhr.status == 200) { //проверяем код состояния 200 - OK
                var answer = xhr.responseXML;
                var error = answer.getElementsByTagName("error")[0].innerHTML;
                var message = answer.getElementsByTagName("message")[0].innerHTML;
                if (error) {
                    document.getElementById("autherror").innerHTML = error + ": " + message;
                } else {
                    document.getElementById("auth").innerHTML = message;
                }
            }
        }
    }
    xhr.send(requestXML); //посылаем данные методом POST
} 