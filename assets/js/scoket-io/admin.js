$(document).ready( () =>{

    socket.on('administrator', (data) => {
        //console.log(data);
        
        if(data.coloe == "red"){
            $(`.span-${data.user} i[name="status"]`).removeClass("online");
            $(`.span-${data.user} i[name="status"]`).addClass("offline");
            $(`.${data.user} button[name="comment"]`).addClass("hide");
            $(`.${data.user} button[name="baduser"]`).addClass("hide");     
        }else{
            $(`.span-${data.user} i[name="status"]`).removeClass("offline");
            $(`.span-${data.user} i[name="status"]`).addClass("online");
            $(`.${data.user} button[name="comment"]`).removeClass("hide"); 
            $(`.${data.user} button[name="baduser"]`).removeClass("hide"); 
        }
            
      }); 

})