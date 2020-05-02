<?php

date_default_timezone_set("Asia/Bangkok");
            //echo $csv; exit;
//var_dump($list_act_report); exit;
           // $str = '"CUST_ANAME","ITEM_NO","ITEM_NAME","MODEL","PRICE"' . "\r\n" ;

             $str = 'CUST_ANAME,ITEM_NO,ITEM_NAME,MODEL,PRICE' . "\r\n" ;

            foreach ($list_act_report as $row => $value) 
            {
                 //var_dump($value);   
                //


                foreach ( $value as $r => $val)
                {
                   $vale  =  str_replace(",", ";", $val['PART_NAME'] );
                   // var_dump($val);
                   //$str .=  '"' . $val['CODE'] . '","'  . $val['PART_ITEM'] . '","' . str_replace(",", ";", $val['PART_NAME'] ) . '","' . $val['MODEL'] . '","' . $val['RATE_TOTAL'] . '"' . "\r\n" ;
                   $str .=  $val['CODE'] . ','  . $val['PART_ITEM'] . ',' . $vale . ',' . $val['MODEL'] . ',' . $val['RATE_TOTAL'] . "\r\n" ;
                }
     
            }
           // exit;
           $str = substr($str, 0, (strlen($str)-2) );  
    $myfile = fopen($filename .'_'. date('YmdHis'). ".csv", 'w') or die("Unable to open file!");

    //echo $str; exit;
    fwrite($myfile,$str);
    fclose($myfile);
    output_file($filename .'_'. date('YmdHis'). ".csv");
    exit;



function output_file($namefile){
        //$namefile = "Query_pods_data.sql";
        $file = $namefile; 
        //echo basename($file); exit;
        header("Content-Description: File Transfer"); 
        header("Content-Type: application/octet-stream"); 
        header("Content-Disposition: attachment; filename=$file" ); 
        readfile ($file);
        exit;
}