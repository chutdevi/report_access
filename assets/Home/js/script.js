window.document.onload = function(e) {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    alert(msie);
}

document.querySelector(".group-bnt button").addEventListener("click", function() {
    document.querySelector(".group-bnt button").disabled = true;
    checklogin();
});
document.addEventListener("keypress", function(evt) {

    evt = evt || window.event;
    switch (evt.keyCode) {
        case 13:
            document.querySelector(".group-bnt button").disabled = true;
            checklogin();
            break;
        default:
            //console.log("Error : " + evt.keyCode);
            break;
    };

});

function checklogin() {
    var usn = document.querySelector("input[name='username']").value;
    var pwd = document.querySelector("input[name='password']").value;
    document.querySelector(".notilogin").classList.add("notishow");
    document.querySelector('.notilogin').style.background = 'linear-gradient(50deg, #8181d8, #6eb2ec8c)';
    setTimeout(function() { document.querySelector('.notilogin>p').innerHTML = '<i class="fa fa-spinner fa-spin ih"></i> Please wait. Logging in system.' }, 200);
    postData('http://192.168.161.102/api_system/Api_event_reportaccess/evtsys_eventlogin', { user: usn, pass: MD5(pwd.trim()) })
        .then((data) => {
            document.querySelector('.notilogin').style.background = (data.msg == "0") ? 'linear-gradient(50deg, #f51e1e8c, #ec6e6e8c)' : 'linear-gradient(50deg, #8181d8, #6eb2ec8c)'
            document.querySelector('.notilogin>p').innerHTML = (data.msg == "0") ? '' : '<i class="fa fa-spinner fa-spin ih"></i> Please wait. Logging in system.';
            setTimeout(function() {
                document.querySelector('.notilogin>p').innerHTML = (data.msg == "0") ?
                    '<i class="fa fa-frown-o ih"></i> Please enter the correct information. There is a wrong username or password.' :
                    '<i class="fa fa-spinner fa-spin ih"></i> Please wait. Logging in system.';
            }, 200);
            setTimeout(function() {
                document.querySelector(".notilogin").classList.add("notihide")
                setTimeout(function() {
                    document.querySelector(".notilogin").classList.remove("notishow")
                    document.querySelector(".notilogin").classList.remove("notihide")
                    document.querySelector('.notilogin>p').innerHTML = ''
                }, 500);
                document.querySelector(".group-bnt button").disabled = false;
            }, 3000)
            if (data.msg == "1") {
                var url = `into?u=${btoa(usn)}&g=${btoa(data.group)}&n=${btoa(data.name)}&a=${btoa(data.address)}`
                const http = new XMLHttpRequest()
                http.open("GET", url)
                http.send()
                http.onload = () => window.location.href = http.responseText
                    //window.location.href = url;
            }
        }).catch((err) => {
            console.log(err);
        });
}

async function postData(url = '', data = {}) {
    const response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        credentials: 'same-origin',
        redirect: 'follow',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    });
    return response.json();
}