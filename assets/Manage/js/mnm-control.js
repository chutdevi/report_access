var datatable_memb;
$(document).ready(function() {
    getmember_manage();
});


function getmember_manage() {
    opt = {
        url: "http://192.168.161.102/api_system/Api_event_reportaccess/evtsys_manage_memb",
        mtyp: "get",
        dtyp: "json",
        parm: {}
    }
    let mtable = $('.manage-mem-table tbody');
    let color_status = 'offline';
    let button_status = 'hide';
    mtable.html('');
    ajax_use(opt, function(i) {
        // console.log(i);
        for (var g of i) {
            // console.log(g["IMAGE_ID"]);
            color_status  = ( g["STATUS_ONLINE"] == '1' ) ? 'online' : 'offline';
            button_status = ( g["STATUS_ONLINE"] == '1' && g["USER_CD"] != username ) ? '' : 'hide';

            mtable.append(
                `<tr name="${g["USER_CD"]}">
                    <td value="${g["IMAGE_ID"]}"  ><img src="${url_img}${g["IMAGE_ID"]}.jpg"></td>
                    <td value="${g["USER_CD"]}"   ><p group="${g["GROUP_CD"]}">${g["USER_CD"]}</p></td>
                    <td value="${g["USER_NAME"]}" >${g["USER_NAME"]}</td>
                    <td value="${g["GROUP_NAME"]}">${g["GROUP_NAME"]}</td>
                    <td value="${g["GROUP_CD"]}">
                    <div class="td-button ${g["USER_CD"]}">
                        <button name="setting"><i class="fa fa-gears"></i><span name="setting"><p>Setting member</p></span> </button> 
                        <button name="lockuse"><i class="fa fa-lock"></i><span name="lockuse"><p>Lock member</p></span></button>
                        <button name="comment" class="${button_status}" onClick=""><i class="fa fa-commenting-o"></i><span name="comment"><p>Comment member</p></span></button> 
                        <button name="baduser" class="${button_status}" onClick="badMember('${g["USER_CD"]}')"><i class="fa fa-thumbs-o-down"></i><span name="baduser"><p>Report member</p></span></button>
                    </div> 
                    </td>
                    <td value="${g["GROUP_CD"]}"><span class="td-status span-${g["USER_CD"]}"><i class="fa fa-circle ${color_status}" name="status"></i></span></td>
                </tr>`
            ) 
        }
        datatable_memb = $('.manage-mem-table').DataTable({
            "lengthMenu": [
                [7, -1],
                [7, "All"]
            ],
            "dom": '<"#ftable.top"flp>r<"#mam-style"t>',
            // "paging": false,
            "ordering": true,
            "info": false,
            "searching": false,
            scrollY: '70vh',
            scrollCollapse: true
                // paging: false
        });

        $('select[name="DataTables_Table_0_length"]').removeClass("form-control");

        // socket.emit('setconnect', {username:username, page:page});

    });
}
$(window).resize(function() {
    var tu = (datatable_memb !== undefined) && datatable_memb.columns.adjust().draw();
});

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