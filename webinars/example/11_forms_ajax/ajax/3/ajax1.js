function sendRequest()
{
    let xhr = new XMLHttpRequest();
    let formData = new FormData(document.forms.login);
    xhr.open('POST', 'response.php', true);
    xhr.onload = function () // функция обработки ответа сервера
    {
        if (xhr.status == 200) //проверяем код состояния 200 - OK
        {
            document.getElementById("auth").innerHTML = xhr.response; //заменяем форму на ответ сервера
        }
    };
    xhr.send(formData); //посылаем данные методом POST
}
