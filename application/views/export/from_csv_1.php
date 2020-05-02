<?php

date_default_timezone_set("Asia/Bangkok");
            //echo $csv; exit;
            unset($str);
            $str = $csv ."\r\n";

// echo "<pre>";
// echo "start";
// echo $str; 
// echo $str; exit;
            foreach ($list_act_report as $row => $value) 
            {
                foreach ( $value as $r => $val)
                {
                    // if ($val=='L40810') 
                    // {
                    //     $val = 'M50040';
                    // }
                   $val  =  str_replace(",", ";", $val );
                   $str .=  $val. ","; 
                }
                $str = substr($str, 0, (strlen($str)-1) )  . "\n" ;  
            }

    $myfile = fopen($filename . date('YmdHis'). ".csv", 'w+') or die("Unable to open file!");
    fwrite($myfile, $str);
    fclose($myfile);
    output_file($filename . date('YmdHis'). ".csv");
    exit;



function output_file($namefile){
        //$namefile = "Query_pods_data.sql";
        $file = $namefile; 
        header("Content-Description: File Transfer"); 
        header("Content-Type: application/octet-stream"); 
        header("Content-Disposition: attachment; filename=" . basename($file) ); 
        //readfile ($file);
        exit;
}