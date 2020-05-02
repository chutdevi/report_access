
const port = "3000";
const ipAddress = "192.168.161.102"
const socketIoAddress = `http://${ipAddress}:${port}`;
var id = "agasdaweafsagegarsh";
var socket  = io(socketIoAddress);

$(document).ready( ()=>{

    // const socket = io(socketIoAddress);
    socket.emit('setconnect', {username:username, page:page});
    socket.on(username, (data) => {
      console.log(data.hi);
      id = data.id;
      socket.emit('my other event', { my: 'data' });
    });


    socket.on(id, (data) => {
        window.location.href = 'http://192.168.161.102/report_access/pcstools/login';
    });   

    socket.on(`${username}-bad`, (data) => {
        window.location.href = 'http://192.168.161.102/report_access/pcstools/login';
    });      
    // socket.on('administrator', (data) => {
    //     console.log(data);
    //   });
});
function myLink(l){ 
    if(l.substring(l.length - 3) != 'lbt') socket.emit( 'chenge-link', {username:username, page:page});
    window.location.href = l;
}

function badMember(u){ 
    socket.emit('bad-member', {username:u} );
    $(`.span-${u} i[name="status"]`).removeClass("online");
    $(`.span-${u} i[name="status"]`).addClass("offline");
    $(`.${u} button[name="comment"]`).addClass("hide");
    $(`.${u} button[name="baduser"]`).addClass("hide");     
}