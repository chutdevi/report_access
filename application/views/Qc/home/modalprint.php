<style type="text/css"> 
    .qcmoal{
        display: none;
        padding-top: 0px;
        padding-bottom: 0px;
        width: 100%;
        height: 100%;  
        padding-left:0px !important;  
    }
    .qcmodalmain{
        width: 100%;
        margin: 0px;
        height: 100%;
        min-height: 100%;
        float: left;
    }
    .qcmodalcontent{
        float: left;
        width: 100%;
        min-height: 100%;
        height: auto;
        padding-top: 50px;
        border: none;
        border-radius: 0;
    }
    .qcmodalheader{
        position: fixed;
        width: 100%;
        height: 50px;
        display: grid;
        grid-template-columns: 250px 1fr;
        background: #cdba89;
        z-index: 5;
    }
    .grid-title{
        justify-self: center;
        align-self: center; 
    }
    .grid-title h5{
        font-size: 25px;
    }
    .grid-option{
        justify-self: flex-end;
        align-self: center;
        padding-right: 35px;
    }


    /* .qcmodalheader>.modal-title{
        float: left;
    } */
    .qcmodalbody{
        float: left;
        width: 100%;
        padding:15px 15px 45px; 
    }

    .qcmodalfooter{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 2px;
    } 

    div[size="A4"]
    {
        width: 1020px;
        margin: 0 auto;
    }
    input[name="search-rec"]{
        height: 35px;
        border: none;
        border-bottom: #848074 solid 2px;
        background: inherit;
        color: white;
        margin: 8px 0;
        cursor: pointer;
        padding: 0px 10px;
    }
    .bntmodal{
        border: black solid 2px;
        background: inherit;
    }
    input[name="search-rec"]:hover{ border-bottom: #848074 solid 1px; }    
    input[name="search-rec"]:focus{ border-bottom: #FFFFFF24 solid 3px; outline: none; color:bisque; font-size: 20px; font-weight:600}    
</style>
 
<div class="modal fade qcmoal" id="modalPrint" tabindex="-1"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="ld" name="qcmodalload">  </div>  
  <div class="qcmodalheader">
    <div class="grid-title">
        <h5 class="modal-title">Receive List print</h5>            
    </div>  
    <div class="grid-option">
        <input type="text" id="search-rec" name="search-rec" onkeyup="searchData()" placeholder="Search your data..">
        <button type="button" class="btn bntmodal" onclick="JsPrint('DataPanel');"><i class="fa fa-print"></i> Print</button>  
        <button type="button" class="btn bntmodal" data-dismiss="modal">Close</button>
    </div>
  </div>  
  <div class="modal-dialog modal-dialog-centered qcmodalmain" role="document">  
    <div class="modal-content qcmodalcontent">
      <div class="modal-body qcmodalbody">
          <div size="A4" id="pnt">
            <table  id="DataPanel" class="modalprint-tab">
                <thead>
                    <tr>
                        <th>VEND_CD</th>
                        <th>VEND_ANAME</th>
                        <th>ITEM_CD</th>
                        <th>MODAL</th>
                        <th>QTY.</th>
                        <th>PONUMBER</th>  
                    </tr>
                </thead>
                <tbody></tbody>  
            </table>
          </div>
      </div>
    </div>
  </div>
</div>