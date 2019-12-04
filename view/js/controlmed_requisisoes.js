function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function login_medico() {
    var form = document.getElementById('form_login');
    var data = {};
    data['crm'] = form.crm.value;
    data['senha'] = form.senha.value;
    console.log(JSON.stringify(data));
    fetch('http://localhost:8080/ControlMED/api/login_medico.php', {
        method: 'POST',
        body: JSON.stringify(data)
    }).then((response) => {
        if (response.ok) {
            setCookie("jwt", response.jwt, 1);
            return response.json();
        } else {
            return Promise.reject({ status: res.status, statusText: res.statusText });
        }

    })
        .then((data) => console.log(data))
        .catch(err => console.log('Error message:', err.statusText));
}
