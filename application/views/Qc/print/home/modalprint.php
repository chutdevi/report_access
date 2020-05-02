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
    }
    .qcmodalheader{
        float: left;
        width: 100%;
        background: #cdba89;
    }
    .qcmodalheader>.modal-title{
        float: left;
    }
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

    div[size="A41"]
    {
        border: solid 2px black;
        float: left;
        width: 21cm;
        height: 29.7cm;
        margin-left: 20%;
        padding: 8px;
    }

</style>



<div class="modal fade qcmoal" id="modalPrint" tabindex="-1"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="ld" name="qcmodalload">  </div>  
  <div class="modal-dialog modal-dialog-centered qcmodalmain" role="document">  
    <div class="modal-content qcmodalcontent">
      <div class="modal-header qcmodalheader">
        <h5 class="modal-title">List receive print</h5> 
      </div>
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
      <div class="modal-footer qcmodalfooter">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn" onclick="JsPrint('DataPanel');"><i class="fa fa-print"></i> Print</button>
      </div>
    </div>
  </div>
</div>