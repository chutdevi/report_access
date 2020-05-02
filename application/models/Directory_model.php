<?php
require_once dirname(__FILE__) . '/query/workdays_report.php';
header("Content-Type:text/html; charset=UTF-8"); 
date_default_timezone_set("Asia/Bangkok");
class Directory_model extends CI_Model 
 {
    var $obj;
    public function __construct()
    {
        parent::__construct();
        ## asset config
        //session_destroy();
        ob_clean();
        flush();
      
        $this->obj = new WORKDAYS_REPORT_QUERY();
 
        $tz_object = new DateTimeZone('+0700');
        $datetime  = new DateTime();
        $datetime->setTimezone($tz_object); 
 
    }

    public function directory_file( $d="")
        {
            $path["p1"] = ($d == "") ? date('Ym') : date('Ym', strtotime($d));
            $dir = sprintf( "G=>/excel/Production-report/%s/" , $path["p1"] );
            $files2 = "";
            if ( is_dir($dir) ){  $files2 = scandir($dir); }  
            // /echo $_SERVER['HTTP_HOST']; exit;
            return $files2;        
        }
        
    public function summarydetail_file( $rdata, $ds = "" ,$de  = ""  )
        {
            $dst = ( empty($ds) ) ? date("Y-m-01") :  date("Y-m-d", strtotime( $ds ) );
            $den = ( empty($de) ) ? date("Y-m-t")  :  date("Y-m-d", strtotime( $de ) );
            $date1=date_create($dst);
            $date2=date_create( $den);
            $diff=date_diff($date1,$date2);
            $date_diff = $diff->d;   
            $arData = array();      
          foreach(range(0,  $date_diff) as $d){  
            $dv = date('Y-m-d', strtotime("+ ". $d . " day", strtotime($dst) ));
            echo "<li>$dv</li>"; 
          }
          exit;
        } 
            
    public function apiget( $url="" )
        {   
           $content = @file_get_contents($url, false);
           $result  = json_decode($content);
           $recLoad = json_decode(json_encode($result), true);   
           //var_dump( $result ); exit;
           return $recLoad; 
        }   
    public function apireq($url="", $dat)
        {   
            $content = http_build_query($dat, '', '&'); 
            $result  = @file_get_contents($url."?".$content);
            $result1 = json_decode($result);
            $recLoad = json_decode(json_encode($result1), true);   
            //var_dump($recLoad); exit; 

            return $result;
        } 
 }
?> 
