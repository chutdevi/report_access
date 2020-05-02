<?php
class Ex_backwork_model extends Backsep_model
{
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

       // $this->pcs = $this->load->database('pick',true);

       // $this->emp = $this->load->database('user',true);
       
       // $this->fa = $this->load->database('fa',true);
        //$this->template->write('plugins_url', $this->plugins);
 
    }

    public function get_compare_tag($da1, $da2)
    {
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
//        echo $datetime->format('Y\-m\-d\ H:i:s');
//        exit;        
        $dSt = date('Y/m/d', strtotime($da1) );
        $dEn = date('Y/m/d', strtotime($da2) );
        //echo $wi; exit;
        // $insert_user_stored_proc = "EXEC GETPICKING_WI ";
        // $data = array('wi' => $wi);
        $excue = $this->expk->query( "CALL getDetail_compare ( '$dSt', '$dEn' )" );
        $recue = $excue->result_array();


        //var_dump($recue); exit;
        return $recue; 

    }





}
?> 
