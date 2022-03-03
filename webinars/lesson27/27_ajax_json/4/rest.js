function sendRequest(button)
{
    let xhr = new XMLHttpRequest();

    let method = button.value;
    xhr.open(method, 'response.php', true);
    let requestData = null;
    if (method !== 'HEAD' && method !== 'GET') {
        //данные формы
        let form = {
            id : document.getElementById("id").value,
            val : document.getElementById("val").value
        };
        requestData = JSON.stringify(form);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.responseType = 'json';
    }

    xhr.onload = function () // функция обработки ответа сервера
    {
        if (xhr.status == 200) //проверяем код состояния 200 - OK
        {
            if (method === "HEAD") {
                document.getElementById("answer").innerHTML = xhr.getResponseHeader("Last-Modified");
                return;
            }
            let answer = xhr.response;
            document.getElementById("answer").innerHTML = answer;
        }
    };

    xhr.send(requestData); //посылаем данные
}