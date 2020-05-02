var filterline = {
     pd01:[],
     pd02:[],
     pd03:[],
     pd04:[],
     pd05:[],
     pd06:[],
     line:[]
};
var dline;
var key = 0;
var ov = 0;
$(document).ready(function()
{
   
    url = "http://192.168.161.102/api_system/api_fasys/fasys_prodbyal/";
    opt = {
            mtyp : "get",
            dtyp : "json",
            parm : { d: udate  }
         }
    ajax_use(url,opt,function(i){ setdetailpd(i); } )


    url = "http://192.168.161.102/api_system/api_fasys/ejsys_prod/";
    ajax_use(url,opt,function(i){ setdataej(i); } ) 
});
function setdetailpd(i)
{
    var total = i["total"];
    var curnt = i["curent"];
    console.log(i);
    for(var inx in total)
    {
       
        if(total[inx].length>0 ){
            $("#FA-" + total[inx][0]['PD'] + " tr:nth-child(1)  th").eq(1).html(numberWithCommas(parseInt( total[inx][0]['TOTALPLAN_QTY'] )));
            $("#FA-" + total[inx][0]['PD'] + " tr:nth-child(2)  th").eq(1).html(numberWithCommas(parseInt(total[inx][0]['TOTALACTU_QTY']  )));
            $("#FA-" + total[inx][0]['PD'] + " tr:nth-child(3)  th").eq(1).html(numberWithCommas(parseInt(total[inx][0]['TOTALALDIFF_QTY'])));             
        }
        if(curnt[inx].length>0)
        {
            $("#FA-" + curnt[inx][0]['PD'] + " tr:nth-child(4)  th").eq(1).html(( parseFloat(curnt[inx][0]['TOTALACTU_QTY']) / parseFloat(curnt[inx][0]['TOTALPLAN_QTY'] ) * 100).toFixed(2) );
            $("#FA-" + curnt[inx][0]['PD'] + " tr:nth-child(5)  th").eq(1).html(numberWithCommas(parseInt(curnt[inx][0]['TOTALPLAN_QTY'])));
            $("#FA-" + curnt[inx][0]['PD'] + " tr:nth-child(6)  th").eq(1).html(numberWithCommas(parseInt(curnt[inx][0]['TOTALACTU_QTY'])));
            $("#FA-" + curnt[inx][0]['PD'] + " tr:nth-child(7)  th").eq(1).html(numberWithCommas(parseInt(curnt[inx][0]['TOTALALDIFF_QTY'])));            
        }
        // $("#FA-PD0").html('<span> '+ total[inx][0]['TOTALACTU_QTY']  + ' </span>');      
    }
   if ( (++ov) == 2 )  $(".overload").hide();      
}

function setdataej(i)
{
    var total = i;   
    console.log(i);
  
    for(var inx in total)
    {       
        $("#EJ-" + total[inx]['PD'] + " tr:nth-child(1)  th").eq(1).html(numberWithCommas(parseInt(total[inx]['PLANDAY'])));
        $("#EJ-" + total[inx]['PD'] + " tr:nth-child(2)  th").eq(1).html(numberWithCommas(parseInt(total[inx]['ACTUDAY'])));
        $("#EJ-" + total[inx]['PD'] + " tr:nth-child(3)  th").eq(1).html(numberWithCommas(parseInt(total[inx]['DIFFDAY']))); 
        $("#EJ-" + total[inx]['PD'] + " tr:nth-child(4)  th").eq(1).html(numberWithCommas(parseInt(total[inx]['PLANACCM'])));
        $("#EJ-" + total[inx]['PD'] + " tr:nth-child(5)  th").eq(1).html(numberWithCommas(parseInt(total[inx]['ACTUACCM'])));
        $("#EJ-" + total[inx]['PD'] + " tr:nth-child(6)  th").eq(1).html(numberWithCommas(parseInt(total[inx]['DIFFACCM'])));
        $("#EJ-" + total[inx]['PD'] + " tr:nth-child(7)  th").eq(1).html( ( parseFloat(total[inx]['ACTUACCM']) / (( parseFloat(total[inx]["PLANACCM"]) < 1 ) ? 1 : parseFloat(total[inx]['PLANACCM'] ) ) * 100).toFixed(2) );    
        
        
        // $("#EJ-PD0").html('<span> '+ total[inx][0]['TOTALACTU_QTY']  + ' </span>');      
    }
    if ( (++ov) == 2 )  $(".overload").hide();  
}


function detailline( p )
{
    $("div[name='load-"+p+"']").show();
    filterline["line"] = [];
    dline = p;
    url = "http://192.168.161.102/api_system/api_fasys/alsys_prodbyln/";
    opt = {
            mtyp : "get",
            dtyp : "json",
            parm : { "d":udate , "p":p }
         }
    ajax_use(url,opt, function(i){ 
    console.log(i);    

        for (const k in i) {
           $("div[name='" + i[k]["LINE_CD"] + "'] .cy .conbody .hcur-date").text( i[k]["CDATE"] );
           $("div[name='" + i[k]["LINE_CD"] + "'] .cr .conbody h7").text( ( parseFloat(i[k]["PRGCUNT"]) < 100.00 ) ? i[k]["PRGCUNT"]+ "%" : parseInt(i[k]["PRGCUNT"])+ "%" );
           $("div[name='" + i[k]["LINE_CD"] + "'] .tt .conbody h7").text( ( parseFloat(i[k]["PRGTOTA"]) < 100.00 ) ? i[k]["PRGTOTA"]+ "%" : parseInt(i[k]["PRGTOTA"])+ "%" );
           $("div[name='" + i[k]["LINE_CD"] + "'] .cy .conbody2 h8").text( ( parseFloat(i[k]["PRGCYTM"]) < 100.00 ) ? i[k]["PRGCYTM"]+ "%" : parseInt(i[k]["PRGCYTM"])+ "%" );
           $("#linecur-" +  i[k]['LINE_CD'] + " tr:nth-child(1)  th").eq(1).html(numberWithCommas(parseInt(i[k]['PLANPROD'])));
           $("#linecur-" +  i[k]['LINE_CD'] + " tr:nth-child(2)  th").eq(1).html(numberWithCommas(parseInt(i[k]['ACTUPROD'])));
           $("#linecur-" +  i[k]['LINE_CD'] + " tr:nth-child(3)  th").eq(1).html(numberWithCommas(parseInt(i[k]['REMNPROD']))); 
           $("#linetol-" +  i[k]['LINE_CD'] + " tr:nth-child(1)  th").eq(1).html(numberWithCommas(parseInt(i[k]['TOTALPN'] )));
           $("#linetol-" +  i[k]['LINE_CD'] + " tr:nth-child(2)  th").eq(1).html(numberWithCommas(parseInt(i[k]['TOTALAC'] )));
           $("#linetol-" +  i[k]['LINE_CD'] + " tr:nth-child(3)  th").eq(1).html(numberWithCommas(parseInt(i[k]['TOTALRM'] )));
           $("#linecyl-" +  i[k]['LINE_CD'] + " tr:nth-child(1)  th").eq(1).html(numberWithCommas(parseInt(i[k]['STDACTU'] )));
           $("#linecyl-" +  i[k]['LINE_CD'] + " tr:nth-child(2)  th").eq(1).html(numberWithCommas(parseInt(i[k]['ACTUPROD'])));
           $("#linecyl-" +  i[k]['LINE_CD'] + " tr:nth-child(3)  th").eq(1).html(numberWithCommas(parseInt(i[k]['STDDIFF'] )));           
           
           filterline["line"].push( i[k]['LINE_CD'] );
        }  $(".ld").hide();
     } );
        $( '#myModal-'+p ).attr("tabindex",-1).focus();

        $( '#myModal-'+p ).keypress(function(evt) {
            evt = evt || window.event;
            console.log("Key press: " + evt.keyCode);

            switch(evt.keyCode) {
                case 13  : 
                            
                            $('#myModalseven-'+p ).modal('show'); 
                            break;
                default  : 
                            console.log(typeof(evt.keyCode) + "Error");
                            break;
            };

        });

        $('#myModalseven-'+p ).on('hidden.bs.modal', function (e) {
            $("body").addClass( "modal-open" ); 
            $( '#myModal-'+p ).attr("tabindex",-1).focus(); 
         });    
      

}


function filtermodal(p){  

    const s =  $("#filine-"+p+" select option:selected");
    console.log(filterline);
    filterline[p].push( s.val() );
    console.log(filterline);  
    $("#sline-"+p).append('<span class="label label-primary" onclick="removeselect(\''+p+'\', \''+key+'\')" key="'+(key++)+'" style="margin: 5px; float:left; cursor: pointer; padding: 8px 20px 6px;  background-color: #6d4215;">'+ s.val() +'</span>');
    s.prop('disabled','disabled');
   

    $("#filine-"+p+" .chosen").val('').trigger("chosen:updated");
 
}
function removeselect(p, k){  
    //console.log($(this));
    var v =  $("#sline-"+p+" span[key='"+k+"']");
    filterline[p].splice(filterline[p].indexOf( v.text() ), 1); 
    const s = $('#filine-'+p+' option[value="'+v.text()+'"]');
    v.remove();
    s.removeAttr('disabled');
    $("#filine-"+p+" .chosen").val('').trigger("chosen:updated");
}
function confirmfilter(p){  
    for (const l in filterline["line"]) {
        $("div[name='"+filterline["line"][l]+"']").hide();
        for (const k in filterline[p]) {
            if (filterline[p][k] == filterline["line"][l]) 
            {
                $("div[name='"+filterline[p][k]+"']").show();
                
            }
        }
        if( filterline[p].length < 1)  $("div[name='"+filterline["line"][l]+"']").show();
        
    }
}
function showdetailLine(l, p)
{
    dline = p;
    url = "http://192.168.161.102/api_system/api_fasys/alsys_prodbyln/";
    opt = {
            mtyp : "get",
            dtyp : "json",
            parm : { "d":udate , "p":p }
         }
    ajax_use(url,opt, function(i){ 
    console.log(i);    

        for (const k in i) {
        //    $("div[name='" + i[k]["LINE_CD"] + "'] .cy .conbody .hcur-date").text( i[k]["CDATE"] );
        //    $("#linecur-" +  i[k]['LINE_CD'] + " tr:nth-child(1)  th").eq(1).html(numberWithCommas(parseInt(i[k]['PLANPROD'])));
        //    $("#linecur-" +  i[k]['LINE_CD'] + " tr:nth-child(2)  th").eq(1).html(numberWithCommas(parseInt(i[k]['ACTUPROD'])));
        //    $("#linecur-" +  i[k]['LINE_CD'] + " tr:nth-child(3)  th").eq(1).html(numberWithCommas(parseInt(i[k]['REMNPROD']))); 
        //    $("#linetol-" +  i[k]['LINE_CD'] + " tr:nth-child(1)  th").eq(1).html(numberWithCommas(parseInt(i[k]['TOTALPN'] )));
        //    $("#linetol-" +  i[k]['LINE_CD'] + " tr:nth-child(2)  th").eq(1).html(numberWithCommas(parseInt(i[k]['TOTALAC'] )));
        //    $("#linetol-" +  i[k]['LINE_CD'] + " tr:nth-child(3)  th").eq(1).html(numberWithCommas(parseInt(i[k]['TOTALRM'] )));
        //    $("#linecyl-" +  i[k]['LINE_CD'] + " tr:nth-child(1)  th").eq(1).html(numberWithCommas(parseInt(i[k]['STDACTU'] )));
        //    $("#linecyl-" +  i[k]['LINE_CD'] + " tr:nth-child(2)  th").eq(1).html(numberWithCommas(parseInt(i[k]['ACTUPROD'])));
        //    $("#linecyl-" +  i[k]['LINE_CD'] + " tr:nth-child(3)  th").eq(1).html(numberWithCommas(parseInt(i[k]['STDDIFF'] )));           
           
        //    filterline["line"].push( i[k]['LINE_CD'] );
         }  
        //  $(".ld").hide();
     } );
    $('#myModaldetail1').modal('show');
    alert(l + "=>" + '#myModal-'+p);
    $('#myModaldetail1').on('hidden.bs.modal', function (e) {  
        $("body").addClass( "modal-open" ); 
        $( '#myModal-'+p.toLowerCase() ).attr("tabindex",-1).focus(); 
     });      
}
function redirectdate()
{
    document.documentElement.scrollTop = 0;
   $(".overload").show(); 
   const udt = new Date( $(".inputdateselect").val() ).toString('yyyy-MM-dd');
   location.replace( "http://192.168.161.102/report_access/Prod/prd/?d="+ udt ); 
}




function ajax_use(url,opt, func )
{
    $.ajax({
        url     : url,
        type    : opt.mtyp,
        dataType: opt.dtyp,
        data    : opt.parm,
        success : func,
        error : function(it)
            {
                console.log(it);   
            }
        });    
}
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
  