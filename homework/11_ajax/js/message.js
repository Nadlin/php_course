function editMessage (e, id) {
    e.preventDefault();
    let a_data = 'id=' + id;
    $('#' + id).load('edit.php', a_data);
}

function deleteMessage (e, id) {
    e.preventDefault();
    let a_data = 'id=' + id;
    $('.messages').load('delete.php', a_data, function () {
        $('#message-' + id).detach();
        setTimeout(function() {
            $('#message').hide();
        }, 3000);
    });
}

function saveEditedMessage(id) {
   // let formData = new FormData(document.forms.editing);
   // $('#' + id).load('formdata_edit.php', formData);
    let xhr = new XMLHttpRequest();
    let data1 = document.getElementById('user' + id).value;
    let data2 = document.getElementById('message_text' + id).value;
    let data3 = document.getElementById('id' + id).value;
    let data4 = document.getElementById('edit_message' + id).value;
    let data5 = document.getElementById('time' + id).value;
    let data = 'user=' + encodeURIComponent(data1)
        + '&message_text=' + encodeURIComponent(data2)
        + '&id=' + encodeURIComponent(data3)
        + '&edit_message=' + encodeURIComponent(data4)
        + '&message_time=' + encodeURIComponent(data5);
    xhr.open('POST', 'formdata_edit.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status == '200') {
            document.getElementById(id).innerHTML = xhr.response;
            setTimeout(function() {
                $('#message').hide();
            }, 3000);
        }
    }
    xhr.send(data);
}