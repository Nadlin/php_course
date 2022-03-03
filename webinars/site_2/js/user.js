function userLogin(url)
{
    let xhr = new XMLHttpRequest();
    let formData = new FormData(document.forms.loginform);
    xhr.open('POST', url, true);
    xhr.responseType = 'json';
    xhr.onload = function ()
    {
        if (xhr.status == 200)
        {
            let answer = xhr.response;
            if (answer.error) 
            {
                document.getElementById("loginerror").innerHTML = answer.message;
            } 
            else 
            {
                document.getElementById("auth").innerHTML = answer.message;
                setTimeout(function(){location.reload(true);}, 3000);
            }
        }
    };
    xhr.send(formData);
}
