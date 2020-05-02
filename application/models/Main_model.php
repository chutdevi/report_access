<?php
require_once dirname(__FILE__) . '/query/workdays_report.php';
header("Content-Type:text/html; charset=UTF-8"); 
date_default_timezone_set("Asia/Bangkok");
class Main_model extends CI_Model 
 {
    var $obj;
    public function __construct()
    {
        parent::__construct();
        ## asset config
        //session_destroy();
        ob_clean();
        flush(); 
 
        $tz_object = new DateTimeZone('+0700');
        $datetime  = new DateTime();
        $datetime->setTimezone($tz_object); 
 
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
            return $recLoad;
        }  
    function img_path($img_path, $nfile)
		{ 
			$file_pointer = $img_path;

			if ( file_exists( $file_pointer ) && filesize($file_pointer) > 0 )  
			{  
			    return $file_pointer;
			} 
			else 
			{  
                $this->save_image_put('http://192.168.82.23/member/photo/'. $nfile,'assets\images\card\img_mem\\' . $nfile);
                
                if ( file_exists( $file_pointer ) && filesize($file_pointer) > 0 )  
                    return $file_pointer;
                else{ 
                     copy("assets\images\card\img_mem\\nouser.jpg",'assets\images\card\img_mem\\' . $nfile);
                     return "assets\images\card\img_mem\\nouser.jpg";
                }
                   
			} 	 
        } 
    function save_image($inPath,$outPath)
		{
		    $in =  fopen($inPath, "rb");
		    $out=  fopen($outPath, "wb");
		    while ($chunk = fread($in,8192))
		    {
		        fwrite($out, $chunk, 8192);
		    }
		    fclose($in);
		    fclose($out);
        } 
    function save_image_put($inPath,$outPath){
        $url    = $inPath;
        $img    = $outPath;
        if( !file_exists($url) ){
            $file = file($url) or die("Unable to open file!");
            file_put_contents($img, $file);      
        } 
    }
 }
?> 
