<?php
require_once dirname(__FILE__) . '/query/workdays_report.php';
class Generate_model extends CI_Model 
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

       //$this->pcs = $this->load->database('pick',true);

       //$this->emp = $this->load->database('user',true);
       
       //$this->fa = $this->load->database('fa',true);

       //$this->ship = $this->load->database('ship',true);

       //$this->expk = $this->load->database('another_db', true);
        //$this->template->write('plugins_url', $this->plugins);
 
    }

    public function reportget_data_workdays($dats, $condi)
        {
            $this->expk = $this->load->database('another_db', true);
            $days = date('Y/m/d', strtotime($condi, strtotime($dats) )) ;
            $sql_expk = $this->obj->ORACLE_GETDATA_REPORT_ITEM($days);
            //echo $sql_expk ; exit;
            $exp_maxl = $this->exec( $this->expk, $sql_expk );
            return $exp_maxl;        
        }
    public function reportget_data_linework($dats, $condi)
        {
            $this->expk = $this->load->database('another_db', true);
            $days = date('Y/m/d', strtotime($condi, strtotime($dats) )) ;
            $sql_expk = $this->obj->ORACLE_GETDATA_REPORT_ONLI($days);
            //echo $sql_expk ; exit;
            $exp_maxl = $this->exec( $this->expk, $sql_expk );
            return $exp_maxl;        
        }
    public function reportget_data_linedays($dats)
        {
            $this->expk = $this->load->database('another_db', true);
            $sql_expk   = $this->obj->ORACLE_GETDATA_REPORT_LINE($dats);
            //echo $sql_expk ; exit;
            $exp_maxl = $this->exec( $this->expk, $sql_expk ); 
            return $exp_maxl;        
        }        

    public function reportget_data_workdays_pa($dats, $condi, $p)
        {
            $this->expk = $this->load->database('another_db', true);
            $days = date('Y/m/d', strtotime($condi, strtotime($dats) )) ;
            $sql_expk = $this->obj->ORACLE_GETDATA_REPORT_ITEM_PA($days, $p);
            //echo $sql_expk ; exit;
            $exp_maxl = $this->exec( $this->expk, $sql_expk );
            return $exp_maxl;        
        }
    public function reportget_data_linework_pa($dats, $condi, $p)
        {
            $this->expk = $this->load->database('another_db', true);
            $days = date('Y/m/d', strtotime($condi, strtotime($dats) )) ;
            $sql_expk = $this->obj->ORACLE_GETDATA_REPORT_ONLI_PA($days, $p);
            //echo $sql_expk ; exit;
            $exp_maxl = $this->exec( $this->expk, $sql_expk );
            return $exp_maxl;        
        }
    public function reportget_data_linedays_pa($dats)
        {
            $this->expk = $this->load->database('another_db', true);
            $sql_expk   = $this->obj->ORACLE_GETDATA_REPORT_LINE_PA($dats);
            //echo $sql_expk ; exit;
            $exp_maxl = $this->exec( $this->expk, $sql_expk );
            return $exp_maxl;        
        }        

   
    public function holidays_data_frommonth($m='2020/02/01', $c='+ 0 day')
        {
            $this->expk = $this->load->database('another_db', true);
            $mth = date('Y/m', strtotime($c,  strtotime( $m ) )) ;
            $sql_expk   = $this->obj->ORACLE_GETDATE_HOLIDAYS_FM($mth);
            //echo $sql_expk ; exit;
            $exp_maxl = $this->exec( $this->expk, $sql_expk );
            return $exp_maxl;             
        }
    public function workdays_data_saturday($m='2020/02/01', $c='+ 0 day')
        {
            $this->expk = $this->load->database('another_db', true);
            $mth = date('Y/m', strtotime($c,  strtotime( $m ) )) ;
            $sql_expk   = $this->obj->ORACLE_GETDATE_SATURDAY_WD($mth);
            //echo $sql_expk ; exit;
            $exp_maxl = $this->exec( $this->expk, $sql_expk );
            return $exp_maxl;             
        }

    public function workdays_data_calenda($m='2020/02/01', $s, $e)
        {
            $this->expk = $this->load->database('another_db', true);
            $sql_expk   = $this->obj->ORACLE_GETDATE_CALENDA_WD($m, $s, $e);
            //echo $sql_expk ; exit;
            $exp_maxl = $this->exec( $this->expk, $sql_expk );
            return $exp_maxl;             
        }

    public function exec( $exc, $sql)
        {

            $excue = $exc->query( $sql );
            $recue = $excue->result_array();             
            //$exc->close();
            //$exc->flush_cache();
            //$exc->reset_query();
            return $recue;

        }
    public function exec_odbc( $exc, $sql)
        {

            $excue = $exc->query( $sql );


        }




}
?> 
