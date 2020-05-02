$(document).ready(function() {
    resheight();

    socket = io.connect(socketIoAddress);
    socket.emit('username', username);


    socket.on('reply_message', function(data) {
        if (data != "") {
            $(".listmsg").append(`<li class="listmsg-receive">${data}</li>`);
            $('.direct-chat-messages').slimScroll({
                scrollTo: ($(".listmsg")[0].scrollHeight + 900) + "px"
            });
        } else {
            alert("nee message");
        }
    });
});

function submitClick(en) {
    //e.preventDefault();

    if (en != "") {
        $(".listmsg").append(`<li>${en}</li>`);
        $('input[name="ad"]').val('');
        console.log($(".listmsg")[0].scrollHeight);
        $('.direct-chat-messages').slimScroll({
            scrollTo: ($(".listmsg")[0].scrollHeight + 900) + "px"
        });
        socket.emit('message_ts', en);
    } else {
        alert("TEST");
    }

    //  socket.on('connect', function(data) {
    //     socket.emit('join', 'Hello world from client');
    // });
}


function resheight() {
    console.log(window.innerWidth);
    if (window.innerWidth < 1400) {
        $('.direct-chat-messages').slimScroll({
            height: '350'
        });
    } else {
        $('.direct-chat-messages').slimScroll({
            height: '610'
        });
    }
}


function reqfile(ph) {
    opt = {
        url: "getfile_prd",
        mtyp: "get",
        dtyp: "json",
        parm: { f: ph }
    }
    ajax_use(opt, function(i) {
        console.log(i);
        //window.location.href = 'http://192.168.161.102/report_access/' + it;
        if (i["flg"] == "1") {
            window.location.href = 'http://192.168.161.102/report_access/' + i["link"];
            $.toast({
                heading: 'Download completed',
                text: `user : ${i["user"]}<br>dowload : complete`,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3500,
                stack: 12
            });
        } else {
            $.toast({
                heading: 'Download uncompleted',
                text: i["message"],
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3500,
                stack: 6
            });
        }
    });
}


$('input[name="ad"]').keypress(function(evt) {
    evt = evt || window.event;
    mes = $('input[name="ad"]').val();
    switch (evt.keyCode) {
        case 13:
            submitClick(mes);
            break;
        default:
            //console.log("Error : " + evt.keyCode);
            break;
    };

});



function ajax_use(opt, func) {
    $.ajax({
        url: opt.url,
        type: opt.mtyp,
        dataType: opt.dtyp,
        data: opt.parm,
        success: func,
        error: function(it) {
            console.log(it);
        }
    });
}



function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}