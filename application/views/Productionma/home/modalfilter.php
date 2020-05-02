<style>
    .modallayout{
        position: relative;
        width: 100%;
        margin: 0;
        padding: 5% 30% 5%;
        height: 100%;      
        background: #000000eb;
    } 
    @media (max-width: 690px) { .minsceen{  padding: 10% 10% 3%; } } 
</style>
<? foreach($data as $inx => $v)  {  ?>
    <div class="modal animated shake" id="myModalseven-<?echo strtolower($inx);?>" role="dialog">
        <div class="modallayout minsceen">
            <div class="modal-content" style="height: 100%; border: solid 5px #505b79; padding: 1% 1%;border-radius: 9px;">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-element-list mg-t-30" style="margin: 0; padding: 5px 15px 2px;">
                                <div class="cmp-tb-hd">
                                    <h2>Filter production lines</h2>                                 
                                </div>
                                <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Please Select</h2>
                                            </div>
                                            <div class="chosen-select-act fm-cmp-mg" id="filine-<?echo strtolower($inx);?>">
                                                <select class="chosen" data-placeholder="Choose a lines..." onchange="filtermodal('<?echo strtolower($inx);?>');">
                                                    <option value='0'>Choose a lines...</option>
                                                    <?foreach($v as $n => $l ) { ?>
                                                        <option value='<? echo $l["LINE_CD"]; ?>'><?echo $l["LINE_CD"];?></option>
                                                    <?}?>
                                                </select>
                                            </div>
                                         </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div id="sline-<?echo strtolower($inx);?>" style="margin: 5px;"></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
                <div class="modal-footer" style="position: absolute; bottom: 0; left: 0; height: 50px; width: 100%; padding:5px;">
                    <button type="button" class="btn btn-success" data-dismiss="modal" style="margin-right: 5%; float: right;">Close</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="confirmfilter('<?echo strtolower($inx);?>');" style="margin-right: 5%; float: right;">Confirm</button>
                </div>
            </div>
        </div>
    </div>
<?}?>