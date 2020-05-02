$(document).ready(function() {

    //const port = "3000";
    //const ipAddress = "192.168.161.102"
    //const socketIoAddress = `http://${ipAddress}:${port}`;
    //const socket = io(socketIoAddress);
    $("input[name='s']").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabprd-list tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

});


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